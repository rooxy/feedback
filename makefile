tmp = /tmp/feedback/
files = assets css images protected themes yii-1.1.4.r2429 index.php

publish: unittests functionaltests version
		
copy:
	rm -rf $(tmp)
	mkdir $(tmp)
	cp -r $(files) $(tmp)
	rm -rf $(tmp)yii-1.1.4.r2429/framework/gii
	rm -rf $(tmp)protected/yiic*
	rm -rf $(tmp)protected/tests
	chmod 750 $(tmp)protected
	
unittests:
	phpunit --configuration protected/tests/phpunit.xml protected/tests/unit
	
functionaltests:
	sh tools/ensureSeleniumRCRunning.sh
	(cd protected/tests; phpunit functional)
	
version: copy
	tar -pvczf Feedback.tar.gz $(tmp)
	