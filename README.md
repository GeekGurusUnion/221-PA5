# PA5
Practical Assignment 5 Group Project

## Github How-to
For now, you have to fork the repo. You then commit to the forked repo and create a pull request. 
A pull request is when you are sure your forked repo works, then you create the request and I'll need to merge it to the main repo. 

Just remember to write clear messages and descriptions, so that backtracking is easy if there is a mistake. 

The 'issues' is our tasks. You can also view that under Projects -> Tasks. 
Issues are for stuff that needs to be done as well as if there is something wrong with the code, you can issue the code & assign somebody to fix it (e.g. if somebody made a mistake in the code). 

You can add tasks yourselves, on the right-hand side you can assign people, select labels, etc. Just remember to add it to a label at least.

Discussions is a place to discuss general stuff, but remember that Issues also have a discuss feature, so rather discuss on a specific topic (e.g. "Setup Github")

## Github Setup
Install the Github CLI: https://cli.github.com/manual/installation

Install Git: https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

- Make a new folder and open it in your IDE (e.g. Visual Studio Code)
- Open a terminal and run `git --version` and `gh --version` to ensure both were installed successfully

_(From here on you should be in the correct working directory)_
- `make setup U="username"` where username is your github username, select `HTTPS` and `open in browser` where asked.
- `make commit M="your message"` to commit & push your changes to your forked repository. 
- You then create a pull request on Github.com or Github Desktop from your forked repository ("Contribute" or simply "Pull requests").

For a start try adding your email address to the Readme file in your IDE, then commit and pull-request it to see if everything works.

### Get the latest contents
Everytime you open your IDE, you can run `make sync`. This will sync all the files from Github onto your computer.

### Pull Requests
To make a pull request, go to your Forked Repository, then say Contribute (above the list the files).

## Make doesn't work
If *make* doesn't work, use this:
### For signing in
- Run `gh auth login`
    - Select `HTTPS` and `open in browser` where asked.
- `gh repo clone <yourUsername>/PA5`. This will create a new folder named PA5 with all the content. This is the forked repo.
- `git remote add upstream https://github.com/PA5G5/PA5.git`. This will set the upstream to the main repo.

### For committing
- `git add . && git commit -m "your message" && git push origin main`
- You then create a pull request on Github.com or Github Desktop from your forked repository ("Contribute" or simply "Pull requests").

### For syncing
- `git fetch upstream && git merge upstream/main`

## Email Addresses
Iwan de Jong: u22498037@tuks.co.za
Stephan Smit: u21489476@tuks.co.za

_add yours here_
