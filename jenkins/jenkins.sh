dnf install docker -y

systemctl start docker

docker build -t custom-jenkins .

mkdir -p /var/jenkins_home
chmod 777 /var/jenkins_home
docker run -d -p 8080:8080 -p 50000:50000 -v /var/jenkins_home:/var/jenkins_home:z --name jenkins custom-jenkins
