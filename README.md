# Automated Mushroom Cultivation Environment with Raspberry Pi Model - 2 B

## Problem domain & Solution
This project is raspberry pi based mushroom cultivation automated system. For mushroom cultivation temperature and humidity are sensitive factors, so these need to be monitored frequently to maintain proper balance of humidity and temperature. Which is very tough for human but need to resolve the issue by any how. So we decided to build an automated system to maintain this balancing of humidity and temperature based on some logical conditions and fires some actions. Like when the humidity is increased and cross its limit then ventilators are open and water spray is open to spray on mushroom. And when the temperature is decreased and it feels cold the ventilators are close and heater starts.

## To complete this project we have used the following equipment:
* Raspberry pi model 2 B
* SD memory card
* Ethernet Cable
* USB Cable to power Pi
* DHT22 sensor 
* 4.7 K Ohm resistor
* 4 - switch Relay module
* Some male-male, male-female and female-female Wire
* PC/Laptop to view and control Raspberry Pi 

## Step 1: OS for the Raspberry Pi
We have installed Raspbian OS to run on Raspberry Pi . First extract the OS files into pendrive by [win32diskimager](https://drive.google.com/open?id=0B496SaFqKMZCcVVJZ2NxcUp6Ujg) and Set SD to Raspberry Pi and powered it up. Raspberry Pi started to boot up. We created a file named “ssh” without any extension into bootable memory card to enable ssh into Raspberry pi. 

## Step 2: Connect Raspbery Pi to PC
Raspberry Pi is now configured and booted up and we should be able to connect it via mobaXterm software from our PC now. Before that we need to make our internet connect to allow sharing. 
#### For windows click: Network and sharing center >  Network connections > Wifi/Ethernet > Properties > Sharing > Allow both option and click OK.
To execute a connection in [mobaXterm](https://drive.google.com/open?id=0B496SaFqKMZCa01PdHZsT09pMWs), hostname or IP is required in order to connect to Raspberry PI. To obtain the Raspberry Pi's IP address we used [ipscan24](https://drive.google.com/open?id=0B496SaFqKMZCdGRRdTBoZFRkQVE) software. Then need to write on mobaXterm commandline “startlxde” to display raspberry pi.

## Step 3: Connecting DHT-22
* Make sure Raspberry Pi power is switched off.
* Breadboard is used for the following connection.
* “+” (VCC) pin to Raspberry Pi GPIO +3.3 V pin.
* “middle” DATA pin to the GPIO pin.
* 4.7 K-Ohm resistor is set up to “+” power pin and DATA pin
* “-” (GND) pin to GPIO Ground pin.

## Step 4: Connecting Relay Module
* Make sure Raspberry Pi power is switched off.
* Breadboard is used for the following connection.
* VCC pin to Raspberry Pi GPIO 5V pin.
* Rest of the four pins to GPIO pin.
* GND pin to GPIO GND pin
* Power on the Raspberry Pi

## Step 4: Install Libraries and Packages
#### PIGPIO library install
```
sudo apt-get update
sudo apt-get upgrade
rm pigpio.zip
sudo rm -rf PIGPIO
wget abyz.co.uk/rpi/pigpio/pigpio.zip
unzip pigpio.zip
cd PIGPIO
make
sudo make install
sudo pigpiod
```
Downloaded “DHT22 AM2302 Sensor” from
http://abyz.co.uk/rpi/pigpio/examples.html#Python%20code
Unzip and pasted into the folder where main script will be written.

#### PHP5 install
```
sudo apt-get insall php5
```

#### MySQL install
```
sudo apt-get install mysql-server
```
Note: set password for mysql

#### PyMySQL install
```
sudo apt-get install pymysql
```

#### Phpmyadmin install
```
sudo apt-get install phpmyadmin
```
Note: set password for phpmyadmin and choose webserver “apache”

#### Apache2 server install
```
sudo apt-get install apache2
sudo nano /etc/apache2/apache2.conf
```
At the bottom write “Include /etc/phpmyadmin/apache.conf”. Save and Exit by CTRL+X
```
sudo /etc/init.d/apache2 restart
hostname -I (to get apache server IP)
```
