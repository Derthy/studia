#!/usr/bin/python3

import sys
from collections import defaultdict

md = defaultdict(list)
stack = ['q0']
moneta = 0
key = 0
stan_konta = 0

md[0] = [1, 2, 3]
md[1] = [2, 5, 6]
md[2] = [5, 8, 4]
md[3] = [6, 4, 7]
md[4] = [7, 7, 7]
md[5] = [8, 3, 7]
md[6] = [4, 7, 7]
md[7] = [7, 7, 7]
md[8] = [3, 6, 7]

while True:
    moneta = eval(input("Wrzuć monetę: "))
    if moneta == 1:
        print('previous_state', key)
        key = md[key][0]
    elif moneta == 2:
        print('previous_state', key)
        key = md[key][1]
    elif moneta == 5:
        print('previous_state', key)
        key = md[key][2]
    else:
        print('wrzuć prawidłową monetę')
        print ('\nStan konta: ', stan_konta)
        continue
    print('current_state', key)
    stack.append('q' + str(key))
    print('path: ', '->'.join(stack))

    stan_konta += moneta
    print ('\nStan konta: ', stan_konta)

    if key == 4:
        print('DZIEKUJE, POPRAWNA KWOTA !')
        sys.exit()
    elif key == 7:
        print('WRZUCILES ZA DUZO !\n KONIEC')
        sys.exit()
