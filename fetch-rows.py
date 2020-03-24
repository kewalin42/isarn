import mysql.connector
import pymysql
from mysql.connector import Error
from pythainlp import word_tokenize


try:
    connection = mysql.connector.connect(host='localhost', database='isarn_corpus',user='root',password='')

    sql_select_Query = "select * from sentence"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()
    print("Total number of rows in Laptop is: ", cursor.rowcount)

    print("\nPrinting each laptop record")
    result = {}
    sum = {}
    cate = {}
    for row in records:
        category = row[5]
        print("row = ", row[0])
    
        text  = row[4]
        newtext = text.replace(" ", "")
        proc = word_tokenize(newtext, engine='newmm')
        newproc = proc
       
        con = pymysql.connect(host='localhost', user='root', passwd='', db='isarn_corpus')
        cursor = con.cursor()
        for i in range(len(proc)):
          word = (proc[i])
          if word in result:
              result[newproc[i]] += 1
              cursor.execute("UPDATE all_word SET wordCount = %s WHERE word = %s", (result[proc[i]], word))
          else:
              result[newproc[i]] = 1
              cursor.execute("INSERT INTO all_word (word, wordCount) VALUES (%s, %s)", (word, result[proc[i]]))

          key_list = list(result)
          wordID = key_list.index(word) + 1
          sum = "SenID: "+ str(SenID) + " category: " +  str(category)
          if sum in cate:
              cate[sum] += 1
              cursor.execute("UPDATE category_word SET count = %s WHERE wordID = %s and categoryID = %s", (cate[sum], SenID,  category))
          else:
              cate[sum] = 1
              cursor.execute("INSERT INTO category_word (wordID, categoryID, count) VALUES (%s, %s, %s)", (SenID, category, cate[sum]))
        con.commit()
        con.close()
except Error as e:
    print("Error reading data from MySQL table", e)
finally:
    if (connection.is_connected()):
        connection.close()
        cursor.close()
        print("MySQL connection is closed")