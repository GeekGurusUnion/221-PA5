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

### Github setup
Install the Github CLI: https://cli.github.com/manual/installation

Install Git: https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

- Make a new folder and open it in your IDE (e.g. Visual Studio Code)
- Open a terminal and run `git --version` and `gh --version` to ensure both were installed successfully
- Run `gh auth login`
    - Select `HTTPS` and `open in browser` where asked.
- Run `gh repo clone <yourUsername>/PA5`. This will create a new folder named PA5 with all the content. This is the forked repo.
- Run `make commit M="your message"` to commit & push your changes to your forked repository. 
    - If this doesn't work, try `git add . && git commit -m "your message" && git push origin main`
- You then create a pull request on Github.com or Github Desktop from your forked repository.

# Email Addresses
Iwan de Jong: u22498037@tuks.co.za

_add yours here_
