# nmc-website

1. [Important File Locations](#important-file-locations)
2. [Workflow Proposal](#workflow-proposal)
3. [Further Reading](#further-reading)
4. [Rolling Back](#rolling-back)

## Important File Locations

- Content
  - This folder is managed under a seperate repo. See `README-content-folder.md` for more information.
- Kirby
  - Leave this alone unless updating the Kirby CMS
- Media
  - Leave this alone too, contents are auto-generated
- Site
   - Blueprints
     - Controls how the panel operates
   - Snippets
     - PHP code snippets
   - Templates
     - PHP page templates 
 
## Workflow Proposal

Kirby relies on four main folders: kirby, media, site, and content. In order to keep our repo from getting too big, we'll use .gitignore to exclude the media and content folders (with one or two individual file exceptions). 

The dev team should install: 
- Docker or mampp/xampp
- Github Desktop (https://desktop.github.com/download/) and Git Large File Storage (https://git-lfs.com/)
- Coding IDE (ex: Visual Studio Code)
- Apache server, php8 (our Docker Compose will do this for you or mampp/xampp)
- php composer (used to update kirby and install/update plugins into the vendor folder)

Set up local repository:
- Clone the nmc-website repo at C://xampp/htdocs (win)
- Clone the nmc-website-content repo. See the README-content-folder.md for how-to.
- Changes focus on site operation and style, not content
- All changes should have detailed notes

Still needed: solution to back up content and media folders.

## Further Reading

1. [Git large file storage info](https://docs.github.com/en/repositories/working-with-files/managing-large-files/collaboration-with-git-large-file-storage)
2. [Checking out a previous commit](https://docs.github.com/en/desktop/managing-commits/checking-out-a-commit-in-github-desktop)
3. [Resetting the panel](https://forum.getkirby.com/t/problems-with-panel-access/24815/2)

## Rolling Back
Take all this with a grain of salt - I'm new here and this should be confirmed by folks with more git knowledge

To view the state of the project at a previous point on the main branch:
1. Navigate to the "history" tab in Github Desktop
2. R-click and select "Checkout commit"
3. Examine your files - they should match the state of the earlier commit
4. When done, click "Detatched HEAD" and switch back to the main branch

To view the state of a branch other than main:
1. Switch branches from "main" to something else
2. Pick a commit the checkout if you want something older
