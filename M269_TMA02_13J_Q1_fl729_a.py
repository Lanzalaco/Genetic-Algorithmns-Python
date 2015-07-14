#!/usr/bin/env python3

#Authors: Felix Lanzlaco
#Date: 22/7/13

import time

# For part (e) uncomment the line below and replace PATH
# with the path to the dictionary file, including the file name  

dictionaryPath = '354984si.ngl'
    
    
# For part (c), uncomment the next line and complete the function 

def allAnagrams(s):
#    node=len(s)
#    anagramList=aList
#    if node == 1:
#        return s
#    stringListstack=[]
#    for i in range(node):
#        stringListstack.append(s[i])
#    Return anagramList

# This function is provided to help you with part (e)

def binarySearch(alist, item):
    first = 0
    last = len(alist) - 1
    found = False
    while first <= last and not found:
        midpoint = (first + last) // 2
        if alist[midpoint] == item:
            found = True
        else:
            if item < alist[midpoint]:
                last = midpoint - 1
            else:
                first = midpoint + 1
    return found  

# For part (e), uncomment the next few lines and complete the function

def printAnagrams(word):
    print("Setting up word list")
    wordList = []
    for l in open (dictionaryPath, 'r'):
        l=l.strip()
        wordList.append(l)
    #  search for anagrams
    print("Finding legitimate anagrams for ", word)
    timeZero = time.clock()
    allAnagrams(word)
    print (len(anagramList), "Possible anagrams generated in", time.clock()-timeZero, "seconds")
    #  search dictionary for anagrams in anagramList
    anagramsFound = aList
    For all i in anagramList:
        timeZero = time.clock()
        binarySearch(wordList,i)
        If found == True
            anagramsFound = anagramsFound + i
    for all i in anagramsFound:
        Print ('anagram is ',i)
    Print ('found',len (anagramsFound)'legitimate anagrams in ', time.clock()-timeZero)
    
# For testing the code you wrote in answer
# to part (c) uncomment the next line

#print(allAnagrams("triangle"))

# For testing the code you wrote in answer
# to part (e) uncomment the next line

#printAnagrams("triangle")

