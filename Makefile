.PHONY: Download_Library Download_Basic_Libraries
.DEFAULT_GOAL=help

LibraryURL=https://raw.githubusercontent.com/PYLOTT/KeyPHP_Basic_Libraries/master/base.zip
LibraryName=base

COM_COLOR   	= \033[0;34m
OBJ_COLOR   	= \033[0;36m
OK_COLOR    	= \033[0;32m
PRIMARY_COLOR 	= $(OK_COLOR)
ERROR_COLOR 	= \033[0;31m
WARN_COLOR  	= \033[0;33m
NO_COLOR    	= \033[m

help: 
	@echo "\n"
	@awk 'BEGIN {FS = ":.*##"; } /^[a-zA-Z_-]+:.*?##/ { printf "$(PRIMARY_COLOR)%-10s$(NO_COLOR) %s\n", $$1, $$2 }' $(MAKEFILE_LIST) | sort
	@echo "\n"

Download_Library: ## download a library with a URL - call this with the correct parametters according to your library
	@echo "$(OK_COLOR)"
	curl -o libraries/$(LibraryName).zip '$(LibraryURL)'
	@echo "$(WARN_COLOR)"
	unzip libraries/$(LibraryName).zip -d libraries/
	rm libraries/$(LibraryName).zip
	@echo "$(OK_COLOR)"
	@echo "Download Successful$(NO_COLOR)"

Download_Basic_Libraries: ## download required - or not - basic libraries
	@echo "$(OK_COLOR)"
	curl -o libraries/base.zip 'https://raw.githubusercontent.com/PYLOTT/KeyPHP_Basic_Libraries/master/base.zip'
	@echo "$(WARN_COLOR)"
	unzip libraries/base.zip -d libraries/
	@echo "$(OK_COLOR)"
	rm libraries/base.zip
	curl -o libraries/stdio.zip 'https://raw.githubusercontent.com/PYLOTT/KeyPHP_Basic_Libraries/master/stdio.zip'
	@echo "$(WARN_COLOR)"
	unzip libraries/stdio.zip -d libraries/
	rm libraries/stdio.zip
	@echo "$(OK_COLOR)"
	@echo "Download Successful$(NO_COLOR)"

Update_Basic_Libraries: ## update required - or not - basic libraries WARNING: YOUR PREVIOUS VERSION WILL BE OVERWRITTEN
	@echo "$(OK_COLOR)"
	curl -o libraries/base.zip 'https://raw.githubusercontent.com/PYLOTT/KeyPHP_Basic_Libraries/master/base.zip'
	@echo "$(WARN_COLOR)"
	rm -r libraries/base/
	unzip libraries/base.zip -d libraries/
	rm libraries/base.zip
	@echo "$(OK_COLOR)"
	curl -o libraries/stdio.zip 'https://raw.githubusercontent.com/PYLOTT/KeyPHP_Basic_Libraries/master/stdio.zip'
	@echo "$(WARN_COLOR)"
	rm -r libraries/stdio/
	unzip libraries/stdio.zip -d libraries/
	rm libraries/stdio.zip
	@echo "$(OK_COLOR)"
	@echo "Updation Successful!!$(NO_COLOR)"