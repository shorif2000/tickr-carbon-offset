# Tickr Carbon Offsetting

<!-- ABOUT THE PROJECT -->
## About The Project
Endpoint exposed at `GET /carbon-offset-schedule`. Endpoint returns a JSON response with an array of recurring dates
 * the dates are sorted by ascending order
 * the dates are in ISO 8601 format YYYY-MM-DD
 * if a given month doesn't have enough days, uses the last day of the month.
 * return a 400 if the request has invalid parameters

### Built With

* Laravel


<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

  * php 7.4
  * composer

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/shorif2000/tickr-carbon-offset.git
   ```
2. Install packages
   ```sh
   composer update
   ```
3. Run server locally
   ```shell
    php artisan serve
   ```


<!-- USAGE EXAMPLES -->
## Usage

- Get next 5 months membership schedule dates

    ```shell
    curl http://localhost:8000/api/carbon-offset-schedule?subscriptionStartDate=2021-01-07&scheduleInMonths=5
    ```

- To run tests
    ```shell
    php artisan tests
    ```

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Sharif Uddin

Project Link: [https://github.com/shorif2000/tickr-carbon-offset](https://github.com/shorif2000/tickr-carbon-offset)





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/shorif2000/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/shorif2000/tickr-carbon-offset/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/shorif2000/repo.svg?style=for-the-badge
[forks-url]: https://github.com/shorif2000/tickr-carbon-offset/network/members
[stars-shield]: https://img.shields.io/github/stars/shorif2000/repo.svg?style=for-the-badge
[stars-url]: https://github.com/shorif2000/tickr-carbon-offset/stargazers
[issues-shield]: https://img.shields.io/github/issues/shorif2000/repo.svg?style=for-the-badge
[issues-url]: https://github.com/shorif2000/tickr-carbon-offset/issues
[license-shield]: https://img.shields.io/github/license/shorif2000/repo.svg?style=for-the-badge
[license-url]: https://github.com/shorif2000/tickr-carbon-offset/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/msuddin86
