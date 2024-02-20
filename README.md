# NB PHP Internal Test

## Overview

Two microservices that create user and receives notification of the created user.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [Docker Setup](#docker-setup)
- [Contributing](#contributing)
- [License](#license)

## Prerequisites

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Tsdjimmy/nb-test.git
    cd your-repo
    ```

2. Copy the environment variables file:

    ```bash
    cp .env.example .env
    ```

3. Update the `.env` file with your configuration values.

4. Install dependencies and start the application:

    ```bash
    docker-compose up --build
    ```

5. Access your application at [http://localhost:8080](http://localhost:8080).

## Usage

Provide instructions on how to use or interact with your application.

## Docker Setup

If you prefer using Docker for development, follow these steps:

1. Build Docker images:

    ```bash
    docker-compose build
    ```

2. Start Docker containers:

    ```bash
    docker-compose up
    ```

3. Access the application at [http://localhost:8080](http://localhost:8080).

## Contributing

If you'd like to contribute to this project, please follow the [Contribution Guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [License Name] - see the [LICENSE](LICENSE) file for details.
