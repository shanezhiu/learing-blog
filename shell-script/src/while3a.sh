#!/bin/sh
while read f
do
	case $f in
		hello)   echo English	;;
		howdy)   echo American  ;;
		gday)    echo Australian ;;
		bonjour) echo French     ;;
		"guten tag") echo german ;;
		"您好！") echo "Chinese" ;;
		*)          echo Unknown Language: $f
			;;
	esac
done < myfile

while false
do
	case $f in 
		hello) echo English ;;
		howdy) echo American ;;
		gday)  echo Australian ;;
		bojour) echo French ;;
		"guten tag") echo german ;;
		"您好！")  echo "Chinese" ;;
		*) echo Unknown Language:$f
			;;
	esac
done < myfile

