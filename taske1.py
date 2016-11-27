file = raw_input("Enter a filename wiht extension:  ")
filename = file + ".pdb"
data = open(filename,"r")
output = open("task1.pdb","w")

data.readline()
for line in data:
	if 'ATOM' in line:
		if 'CA' in line:
			print line
			outfile.write(line)