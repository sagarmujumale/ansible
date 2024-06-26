#!/bin/bash

# Prompt user for HOSTNAME and IP
read -p "Enter the HOSTNAME: " HOSTNAME
read -p "Enter the IP address: " IP

# Path to the template configuration file
TEMPLATE_CONFIG="config.cfg"

# Destination directory
DEST_DIR="/etc/nagios/servers"

# Ensure the destination directory exists
mkdir -p "$DEST_DIR"

# Destination configuration file
DEST_CONFIG="$DEST_DIR/${HOSTNAME}.cfg"

# Copy the template configuration file to the destination
cp "$TEMPLATE_CONFIG" "$DEST_CONFIG"

# Replace HOSTNAME and IP placeholders in the copied configuration file
sed -i "s/HOSTNAME/$HOSTNAME/g" "$DEST_CONFIG"
sed -i "s/IP/$IP/g" "$DEST_CONFIG"

echo "Configuration file for $HOSTNAME has been created at $DEST_CONFIG"

# Restart Nagios to apply the new configuration
systemctl restart nagios

echo "Nagios service has been restarted to apply the new configuration."

