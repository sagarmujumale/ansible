# ansible

ansible-playbook -i inv.ini install.yaml --extra-vars "mysql_root_password=root sample_user_password=root"

docker build -t custom-jenkins .

docker run -d -p 8080:8080 -p 50000:50000 -v /var/jenkins_home:/var/jenkins_home:z --name jenkins jenkins/jenkins:lts
