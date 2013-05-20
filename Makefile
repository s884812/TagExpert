main:	clean
	sudo cp -rf * /var/www/html
	rm /var/www/html/Makefile
clean:
	rm -rf /var/www/html/*
