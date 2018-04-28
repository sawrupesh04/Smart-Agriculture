#!/usr/bin/python
import time
import datetime
import glob
import MySQLdb
from time import strftime
import sys
import Adafruit_DHT
import RPi.GPIO as GPIO
#import time

channel = 21
GPIO.setmode(GPIO.BCM)
GPIO.setup(channel, GPIO.IN)

hum, temp = Adafruit_DHT.read_retry(11, 4)
moist="NULL"
db = MySQLdb.connect(host="localhost", user="sumit",passwd="singh", db="mydatabase")
cur = db.cursor()


def update(m,i):
      db = MySQLdb.connect(host="localhost", user="sumit",passwd="singh", db="mydatabase")
      cur = db.cursor()
      try:
        updatequery=("""UPDATE sensorlogs SET moisture=%s WHERE id=%s""",(m,i))
        cur.execute(*updatequery)
        db.commit()
        print "update completed "
#       print str(i)
      except:
        db.rollback()
        print "sorry problem in updating updated!!"


def delLogs():
