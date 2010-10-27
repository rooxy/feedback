#!/bin/bash

RESULT=`lsof -w -n -i tcp:4444 | grep java`
if [ -z "$RESULT" ];
then
	SCRIPT=$(readlink -f $0)
	SCRIPTPATH=`dirname $SCRIPT`
	java -jar ${SCRIPTPATH}/selenium-server.jar &
	sleep 2
fi
