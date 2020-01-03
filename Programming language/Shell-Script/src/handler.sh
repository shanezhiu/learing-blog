#!/bin/sh
echo "事件					时间点" 
echo "输入您完成的事件"
read ENVENT
echo "${ENVENT}					`date`" >> 1.txt
echo "${SCRIPTPATH}"
