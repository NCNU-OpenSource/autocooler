#!/usr/bin/python
import sys
import Adafruit_DHT
import RPi.GPIO as GPIO
from time import sleep

GPIO.setwarnings(False)

#temperature init
sensor = 22
pin = 4
#led init
GPIO.setmode(GPIO.BCM)
GPIO.setup(23, GPIO.OUT)
GPIO.setup(24, GPIO.OUT)
GPIO.setup(25, GPIO.OUT)
GPIO.setup(26, GPIO.OUT)
GPIO.output(26, GPIO.LOW)


#buzzer
buzzer_pin=21
GPIO.setup(buzzer_pin, GPIO.OUT)
myPWM=GPIO.PWM(buzzer_pin, 50)
scale=[262, 277, 294, 311, 330, 349, 370, 392, 415, 440, 466, 494, 524]

while True:
    humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)

    if humidity is not None and temperature is not None:
        print('Temp={0:0.1f},  Humidity={1:0.1f}%'.format(temperature, humidity))
        GPIO.output(23, GPIO.HIGH)
        if temperature < 25.5:
            GPIO.output(24, GPIO.LOW)
            GPIO.output(23, GPIO.HIGH)
            GPIO.output(26, GPIO.LOW)

        elif temperature >= 28 and temperature < 30:
            GPIO.output(24, GPIO.LOW)
            GPIO.output(25, GPIO.LOW)

            GPIO.output(24, GPIO.HIGH)
            GPIO.output(25, GPIO.LOW)
        elif temperature >= 30 and temperature < 32:
            GPIO.output(24, GPIO.HIGH)
            GPIO.output(25, GPIO.HIGH)
            GPIO.output(26, GPIO.HIGH)
            myPWM.stop(50)
        elif temperature >= 32:
            GPIO.output(24, GPIO.LOW)
            GPIO.output(25, GPIO.LOW)

            GPIO.output(23, GPIO.HIGH)
            sleep(0.1)
            GPIO.output(23, GPIO.LOW)
            GPIO.output(24, GPIO.HIGH)
            sleep(0.1)
            GPIO.output(24, GPIO.LOW)
            GPIO.output(25, GPIO.HIGH)
            sleep(0.1)
            GPIO.output(25, GPIO.LOW)
            GPIO.output(26, GPIO.HIGH)
            # a=0
            myPWM.start(50)
            # while a < 13:
            myPWM.ChangeFrequency(scale[0])
            #     sleep(0.5)
            #     a=a+1
        sleep(1)
