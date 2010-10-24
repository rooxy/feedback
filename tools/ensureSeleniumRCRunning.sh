#!/bin/bash

RESULT=`lsof -w -n -i tcp:4444 | grep java`
if [ -z "$RESULT" ];
then
	java -jar /usr/share/selenium/selenium-remote-control-1.0.3/selenium-server-1.0.3/selenium-server.jar &
	sleep 2
fi
