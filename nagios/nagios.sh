#!/bin/bash

# Install EPEL release and Nagios
dnf -y install epel-release
dnf -y install nagios 

# Modify Apache configuration for Nagios
sed -i '/^[^#]*Require all granted/s/^/#/' /etc/httpd/conf.d/nagios.conf

# Add Nagios admin user
htpasswd /etc/nagios/passwd nagiosadmin 


# Enable and start Nagios service
systemctl enable nagios
systemctl start nagios

# Enable and restart Apache service
systemctl enable httpd
systemctl restart httpd

# Configure firewall to allow HTTP/HTTPS
firewall-cmd --add-service={http,https} --permanent
firewall-cmd --reload

# Modify nagios.cfg to include additional configuration directory
sed -i 's|#cfg_dir=/etc/nagios/servers|cfg_dir=/etc/nagios/servers|' /etc/nagios/nagios.cfg

# Create directory for additional host configurations
mkdir -p /etc/nagios/servers

# Restart Nagios to apply new configuration
systemctl restart nagios

echo "Nagios setup and configuration completed successfully."

