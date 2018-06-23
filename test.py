import math



def getKey(keyin):
    keyin = int(keyin)
    secondnum = math.ceil((keyin-1000)/500)
    frontchar = chr(74) if (keyin%10)==0 else chr(int(keyin%10)+64)
    keyin = str(keyin)
    if(int(keyin) % 1000 == 0):
        lastnum = 50
    elif int(keyin[1:3]) == 50 and int(keyin[3:4]) == 0:
        lastnum = 50
    elif int(keyin)%10 == 0:
        lastnum = (int(keyin[1:3])%50)
    else:
        lastnum = (int(keyin[1:3])%50)+1
     

    return (str(frontchar)+str(secondnum)+str(lastnum))

   

if __name__ == "__main__":
    getcode = input()
    print(getKey(getcode))
