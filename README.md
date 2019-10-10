# WordPress Skeleton <!-- omit in toc -->

Maybe not a complete solution for managing WordPress as a nerd but close to it 🤓

This repo is intended to be used as a starter point when developing a new site but also easy enough to convert an existing project to this workflow.

What this project tries to achieve is to give you a way to be sure that you have
as much as possible under control when managing WordPress sites from the developer's perspective.

[TODO] I'll make a micro site to explain the whys and hows of this project. For now basic usage instructions will be given in this readme file to use it.

# TOC <!-- omit in toc -->

- [Disclaimer](#disclaimer)
- [Usage](#usage)
  - [Install](#install)
  - [Add/Remove plugins from the WordPress.org repository](#addremove-plugins-from-the-wordpressorg-repository)
  - [Add/Remove plugins/themes from another repository](#addremove-pluginsthemes-from-another-repository)
- [Deploy](#deploy)
  - [Asumptions](#asumptions)
- [Credits](#credits)

# Disclaimer

This setup might not be suitable for all kinds of environments or may need some adjustments to work properly with your either local or production server.

Pull requests are welcome as long as they are addressing compatibility issues, fixing bugs or adding features that will make it more flexible. Any PR that just changes stuff to make it work with a specific environment will be rejected, instead find a proper way to provide compatibility with that environment without breaking others.

# Usage

## Install

1. Clone this repository `git clone REPO_LINK my-project`
2. Run `composer install`
3. Rename `.env.example` and `wp-cli.yml.example` to `.env` and `wp-cli.yml`
4. Create your database if you haven't already
5. Fill in the details in `.env` and `wp-cli.yml` for the environment you're working on
6. Point your web root to the `/public` directory
7. Now visit the website and follow install instructions or import your database
8. Optionally, you can import the official WPTRT dummy data to have something to work with

## Add/Remove plugins from the WordPress.org repository

[TODO]

## Add/Remove plugins/themes from another repository

[TODO]

# Deploy

For the deploying process we opted for [Deployer](https://deployer.org/) because of its ease of use, the built-in atomic deployments (aka zero downtime deployments) and it's free!

## Asumptions

- You have SSH access to the server
- You have an SSH key on the server linked to your GitHub account/repository for the pulls.

Note: If you're running on production copy `local-config.sample.php` to `production-config.php`.

# Credits

This project as many others is based and inspired on others work and we want to thank them for their contribution to the open source community.

- [@markjaquith](https://github.com/markjaquith) and his [WordPress-Skeleton](https://github.com/markjaquith/WordPress-Skeleton)
- [@gilbitron](https://github.com/gilbitron) and his [wordpress-skeleton](https://github.com/gilbitron/wordpress-skeleton) and his article [Managing Your WordPress Site With Git And Composer](https://deliciousbrains.com/install-wordpress-subdirectory-composer-git-submodule/) which made me start building my own solution.
- [@laravel](https://github.com/laravel) and their [awesome framework](https://github.com/laravel/laravel)
- [@deployphp](https://github.com/deployphp) and his [Deployment Tool](https://github.com/deployphp/deployer)
- And many others I can't remember.. if you are one of them please Fork and PR with your name.
