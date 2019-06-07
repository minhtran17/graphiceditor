# Setting up development environment

1. Clone git 

        git clone git@github.com:minhtran17/urbansport.git

2. Install [docker](https://docs.docker.com/engine/installation)

3. Install [docker-compose](https://docs.docker.com/compose/install/)

4. Bring up docker development environment

        make

# Run commandline

1. Login to container

        docker exec -it graphic-editor bash
        
2. Run commandline

        php main.php geometric:draw /graphiceditor/sampleconfig.json
        