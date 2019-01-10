#!/usr/bin/python3

import Adafruit_DHT
import pymysql

#temperature init
sensor = 22
pin = 4

#get temerature
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)
if humidity is not None and temperature is not None:
    temp = '{0:0.1f}'.format(temperature)

#mysql
conn = pymysql.connect(host='localhost',  user='cooler',
                       passwd="etKxcHNnOura1Bxn",  db='cooler')
cur = conn.cursor()
sql = "INSERT INTO `record` (`id`, `templates`, `timestamp`) VALUES (NULL, '"+temp+"', CURRENT_TIMESTAMP);"
cur.execute(sql)
cur.close()
conn.close()