#!/usr/bin/env python

import re

data = ''

for line in open('ciagi_liczb.txt', 'r'):
        word = re.findall('[0-9]|\#', line)
        data += str(''.join(word))

print data
