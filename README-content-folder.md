# Our Kirby Content Folder
This folder is managed by a seperate github repo.
Repo URL:

## Using the repo
### Developers
You should clone it from inside this nmc-website repo using:

`git clone <REPOSITORY_URL> content`

This will clone using the folder name of "content" which is what kirby is looking for.

### Staging and Live
These servers have the nmc-website-content repo set as a remote using https with a key.
https://<github_key_goes_here>@github.com/NewMediaCaucus/nmc-website-content.git

Example: `git remote add origin https://<github_key_goes_here>@github.com/NewMediaCaucus/nmc-website-content.git`

## Kirby folder names
1_home
2_opportunities
    opportunities.txt # can be blank
    1_opportunity_post # must be generated from within panel
3_blog
    blog.txt # can be blank
    1_blog_post
