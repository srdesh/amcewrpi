import pymysql.cursors
import pigpio
import DHT22
import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)

#db
conn = pymysql.connect(host="localhost",user="root",password="root",db="myDB")

# init list with pin numbers
pinList = [2, 3, 4, 17]

    
#timer
from time import sleep

#dht22 gpio port
pi = pigpio.pi()
dht22 = DHT22.sensor(pi, 14)
dht22.trigger()

#variables
sleepTime = 3
measure_a = '75'
measure_b = '60'

#current time and date
def time():
	from time import strftime
	current_date = strftime("%Y-%m-%d")
	current_time =strftime("%H:%M:%S")
	return (current_date, current_time)

#dht22 data
def readDHT22():
    dht22.trigger()
    humi = '%.2f' % (dht22.humidity())
    temp = '%.2f' % (dht22.temperature())
    return (humi, temp)

#loop
while True:
	
    humidity, temperature = readDHT22()
    cdate, ctime = time()
    print ("Humidity is: " + humidity + "%")
    print ("Temperature is:" + temperature + "C")
    with conn.cursor() as cursor:
			sql = "INSERT INTO `currentTable` (`ctemp`,`chumi`) VALUES (%s, %s)"
			cursor.execute(sql, (temperature,humidity))
			conn.commit()
			
	#conditions
    if humidity > measure_a:
        GPIO.setup(2, GPIO.OUT) 
        GPIO.output(2, GPIO.LOW)
        GPIO.setup(3, GPIO.OUT) 
        GPIO.output(3, GPIO.LOW)
        print ("STATUS: HEAT ALERT!!")
        print ("ACTION: Room Ventilator - ON and Water Spary - ON")
        with conn.cursor() as cursor:
			sql = "INSERT INTO `myTable` (`date`,`time`,`temp`,`humi`,`status`) VALUES (%s, %s, %s, %s, %s)"
			cursor.execute(sql, (cdate,ctime,temperature,humidity,'HEAT ALERT! Room ventilator - ON and Water Spray - ON'))
			conn.commit()
    elif humidity < measure_b:
        GPIO.setup(2, GPIO.OUT) 
        GPIO.output(2, GPIO.LOW)
        GPIO.setup(4, GPIO.OUT) 
        GPIO.output(4, GPIO.LOW)
        print ("STATUS: COLD ALERT!!")
        print ("ACTION: Room Ventilator - OFF and Heater - ON")
        with conn.cursor() as cursor:
			sql = "INSERT INTO `myTable` (`date`,`time`,`temp`,`humi`,`status`) VALUES (%s, %s, %s, %s, %s)"
			cursor.execute(sql, (cdate,ctime,temperature,humidity,'COLD ALERT! Room ventilator - OFF and Heater - ON'))
			conn.commit()
    else: 
		GPIO.setup(2, GPIO.OUT)
		GPIO.setup(2, GPIO.HIGH)
		GPIO.setup(3, GPIO.OUT)
		GPIO.setup(3, GPIO.HIGH)
		GPIO.setup(4, GPIO.OUT)
		GPIO.setup(4, GPIO.HIGH)
		print ("STATUS: NORMAL")
		print ("ACTION: NONE")
	
    sleep(sleepTime)

