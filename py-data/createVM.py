'''
	Copyright (C) 2013 Sameer Balasubrahmanyam

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 '''


import sys,os,subprocess


def createVM(email):
	#register="VBoxManage registervm C:/Users/Sameer/VirtualBox\ VMs/Windows7/Windows7.vbox "
	#os.system(register)
	command="VBoxManage clonevm \"Windows7\" --snapshot \"Linked Base for Windows7 and Windows7 Clone\" --options link --options keepdisknames --name "+email+" --register"
	#os.system(command)
	#print command
	#command="VBoxManage list vms "
	process = subprocess.Popen(command, stdout=subprocess.PIPE, stderr=None, shell=True)

	output = process.communicate()

	print output[0]


createVM(sys.argv[1])
