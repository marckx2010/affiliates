<h3>Open source addendum (March 2024)</h3>
The code challenge / test was pretty basic. Read some data and produce an HTML table. I was tempted to just retool 
another coding test that read some data and produced - well at least a nice Rappaport Livewire table.

More on this on my website at: https://marckx.tech/about/apps/affiliates

Also worthy of mention is during my conversation with this company's VP - I mentioned how I was able to leverage
some Symfony code to effectively multi-task in PHP. He told me that was not possible. I sent him some code snippets
and eventually wrote my first article on my site at: https://marckx.tech/articles/multitasking

As I wrote, there are many better alternatives to accomplishing this now (even then). But if all you've got is
Laravel/Symfony and you have a task that runs every minute yet takes more than a minute to run, this worked nicely!

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/marckx2010/affiliates">
    <!-- <img src="images/Screenshot 2023-08-08 105259.png" alt="Logo" width="80" height="80"> -->
  </a>

<h3 align="center">Affiliates (Demo)</h3>

  <p align="center">
    We want to invite any affiliate that lives within a specificied radius of our home office for some food and drinks 
    <br />
    <!-- <a href="https://github.com/github_username/repo_name"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/github_username/repo_name">View Demo</a> -->
    ·
    <a href="https://github.com/github_username/repo_name/issues">Report Bug</a>
    ·
    <a href="https://github.com/github_username/repo_name/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <!-- <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
    <li><a href="#contributing">Contributing</a></li> -->
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>

  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

<!-- [![Product Name Screen Shot][product-screenshot]](https://example.com) -->

Bollo***.com Group Dev Code Test

Bollo***.com Groups home office is in Limerick, where the best minds come together to solve Technical problems.

The JSON-encoded affiliates.txt file attached contains a shortlist of affiliate contact records - one per line.

We want to invite any affiliate that lives within 100km of our Limerick office for some food and drinks using this text file as the input (without being altered).

### Task
Write a program that will read the full list of affiliates from this txt file and output the name and IDs of matching affiliates within 100km, sorted by Affiliate ID (ascending).

You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians.

You can find the affiliate list in this repository called affiliates.txt.

Please don’t forget, your code should be production ready, clean and tested!

## Nice to haves:
- Demonstrate understanding of MVC
- Unit Tests
- Basic HTML output
- Usage of a PHP Framework (We're a Laravel based company so bonus points for using that)
- Use the original txt file as input

<p align="right">(<a href="#readme-top">back to top</a>)</p>


### Built With

* [![Vue][Vue.js]][Vue-url]
* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstap][Bootstrap.com]][Bootstrap-url] 
* <font size="5">[Inertia js][Inertia-url]</font>
* <font size="5">[Leaflet js][Leaflet-url]</font>

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Let's get a local copy running...

### Prerequisites
- PHP 8.1 installed
- Composer (tested with version 2.5.4)
- Node / NPM (tested with v18.12.1 & 8.19.2 respective)
  ```sh
  npm install npm@latest -g
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/marckx2010/affiliates.git
   ```
2. Change directory to the folder git cloned into
   ```sh
   cd affiliates 
   ```
 
3. Run composer install
   ```sh
   composer install
   ```
4. Install NPM packages
   ```sh
   npm install
   ```
5. Build resources
   ```sh
   npm run build
   ```
6. Copy sample .env.example file to .env
   ```js
   cp .env.example .env
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Unit Tests
Unit/Feature tests of the code may be performed by running:

   ```js
   php artisan test
   ```
and all should pass successfully.

<!-- USAGE EXAMPLES -->
## About
The UI/UX of the application has been enhanced and made more interactive with the inclusion of a Leaflet js map that shows the radius, starting at 100 kilometers. A modal allows this radius to be changed both with a numemrical entry or using a convenient slider. 

I reckoned this added a standout dimension to the application.

## Usage
Use local PHP server to run the demo _(you may choose any open port)_
   ```js
   php artisan serve --port=8004
   ```

Connect to [http://127.0.0.1:port#]

The .env settings are for production mode with debug set to false. Feel free to modify these values.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- ROADMAP -->
## Roadmap

- [x] Initial requirements met with import of data and presentation in table.
- [x] Interactive Leaflet js Geo map added with custom marker for home office and markers for each affiliates location. Those lucky enough to be invited include a shamrock in the marker popup.  
- [x] Unit Testing
    - [ ] More assertions: with only about a dozen assertions as it stands the unit testing is hardly comprehensive.
    - [ ] Cypress End-To-End Testing. One of the best test platforms out there (IMO) partly because of how it may be used concurrently with development in a TDD manner.
<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- CONTACT -->
## Contact

Mark Arnum - https://www.linkedin.com/in/mark-arnum-760760109/ - mark@marckx.tech

Project Link: [https://github.com/marckx2010/affiliates](https://github.com/marckx2010/affiliates)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS 
## Acknowledgments

* []()
* []()
* []()

<p align="right">(<a href="#readme-top">back to top</a>)</p>
-->


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo_name.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo_name/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo_name.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo_name/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo_name.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo_name/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo_name.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo_name/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo_name.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo_name/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/linkedin_username
[product-screenshot]: images/screenshot.png
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Leaflet-com]: https://leafletjs.com/docs/images/logo-ua.png
[Leaflet-url]: https://leafletjs.com/
[Inertia0.com]: https://raw.githubusercontent.com/agungksidik/public-assets/master/logo/inertiajs-logo.png "width=100"
[Inertia-url]: https://inertiajs.com/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com

