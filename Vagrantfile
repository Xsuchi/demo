# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # Base Ubuntu box (20.04 LTS)
  config.vm.box = "ubuntu/focal64"

  # Private network so you can SSH or access services
  config.vm.network "private_network", ip: "192.168.33.10"

  # Optional: forward Docker ports if you want to access containers from host
  # Example: map host 8080 → guest 80
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # VirtualBox provider tweaks
  config.vm.provider "virtualbox" do |vb|
    vb.memory = "2048"   # allocate 2GB RAM
    vb.cpus = 2          # 2 CPU cores
  end
end