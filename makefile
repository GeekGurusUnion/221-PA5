setup:
	# ONLY RUN ONCE. Example: make setup U="iwandejong"
	gh auth login && gh repo clone $(U)/PA5 && git remote add upstream https://github.com/PA5G5/PA5.git
commit:
	# Example commit: make commit M="Added a new feature"
	git add . && git commit -m "$(M)" && git push origin main
sync:
	# Syncs the local repo with the remote repo
	git fetch upstream && git merge upstream/main