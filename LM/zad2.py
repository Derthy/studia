#!/usr/bin/env python

import re
from collections import defaultdict

data = ''
numbers = defaultdict(list)
counter = 0
states = defaultdict(list)
transition_table = defaultdict(list)

states[0] = [[0, 1], [0, 2], [0, 3], [0, 4],
             [0, 5], [0, 6], [0, 7], [0, 8], [0, 9]]
states[1] = [4, 1, 1, 1, 1, 1, 1, 1, 1, 1]
states[2] = [2, 11, 2, 2, 2, 2, 2, 2, 2, 2]
states[3] = [3, 3, 11, 3, 3, 3, 3, 3, 3, 3]
states[4] = [4, 4, 4, 11, 4, 4, 4, 4, 4, 4]
states[5] = [5, 5, 5, 5, 11, 5, 5, 5, 5, 5]
states[6] = [6, 6, 6, 6, 6, 11, 6, 6, 6, 6]
states[7] = [7, 7, 7, 7, 7, 7, 11, 7, 7, 7]
states[8] = [8, 8, 8, 8, 8, 8, 8, 11, 8, 8]
states[9] = [9, 9, 9, 9, 9, 9, 9, 9, 11, 9]
states[10] = [10, 10, 10, 10, 10, 10, 10, 10, 10, 11]
states[11] = [11, 11, 11, 11, 11, 11, 11, 11, 11, 11]


for line in open('ciagi_liczb.txt', 'r'):
        word = re.findall('[0-9]|\#', line)

if word[-1] == '#':
    del word[-1]

if word[0] == '#':
    del word[0]

for w in word:
    if w == '#':
        counter += 1
        continue
    numbers[counter] += w

counter = 0

for i in numbers.values():

    try:
        print numbers[0]
    except IndexError:
        print 'dupa'
