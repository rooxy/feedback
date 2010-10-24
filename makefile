tmp = /tmp/feedback/
files = assets css images protected themes yii-1.1.4.r2429 index.php

publish: unittests functionaltests version
		
copy:
	rm -rf $(tmp)
	mkdir $(tmp)
	cp -r $(files) $(tmp)
	rm -rf $(tmp)yii-1.1.4.r2429/framework/gii
	rm -rf $(tmp)protected/yiic*
	
unittests:
	phpunit --bootstrap protected/tests/bootstrap.php protected/tests/unit
	
functionaltests:
	sh tools/ensureSeleniumRCRunning.sh
	phpunit --bootstrap protected/tests/bootstrap.php protected/tests/functional
	
version: copy
	tar -pvczf Feedback.tar.gz $(tmp)
	