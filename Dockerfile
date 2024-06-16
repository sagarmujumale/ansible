FROM jenkins/jenkins:lts

USER root

# Install dependencies and Ansible
RUN apt-get update \
    && apt-get install -y ansible \
    && rm -rf /var/lib/apt/lists/*

USER jenkins

