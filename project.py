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
# connecting to the database, do enter the passwd


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
       try:
        # del=("""TRUNCATE TABLE sensorlogs""")
         cur.execute("TRUNCATE TABLE sensorlogs")
         db.commit()
         print "deleted all logs"
        except:
         db.rollback()
         print "error in deleting the logs"


def callback(channel):
        colid=cur.lastrowid
        if GPIO.input(channel):
                print "Water Detected!"
                moist="1"
                update(moist,colid)
        #       time.sleep(1)
        else:
                print "No Water Detected!"
                moist="0"
                update(moist,colid)
        #       time.sleep(3)

def logData():
    print temp
    print hum
    print moist
    datetimeWrite = (time.strftime("%Y-%m-%d ") + time.strftime("%H:%M:%S"))
    print datetimeWrite
    sql1 = ("""INSERT INTO sensorlogs(date,temperature,humidity,moisture) VALUES (%s,%s,%s,%s)""",(datetimeWrite,temp,hum,moist))
    try:
      #  print "Writing to database..."
        # Execute the SQL command
        cur.execute(*sql1)
        # Commit your changes in the database
        db.commit()

        print "Write Completed  "
    except:
        # Rollback in case there is any error
        db.rollback()
        print "Failed writing to database"
    cur.close()
    db.close()

    GPIO.add_event_detect(channel, GPIO.BOTH, bouncetime=300)
    GPIO.add_event_callback(channel, callback)
    time.sleep(10)

logData()

#delLogs()

