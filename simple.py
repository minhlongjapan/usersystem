from datetime import datetime
import imp
import time
import datetime


# ウェブ上

# from selenium import webdriver
# driver = webdriver.Chrome("./chromedriver.exe")
# driver.set_window_size(800,1000)
# driver.get ("https://tenki.jp/")
# driver.find_element_by_id('keyword').send_keys('104-0061')
# time.sleep(1)
# driver.find_element_by_id('btn').click()
# time.sleep(1)
# driver.find_element_by_class_name('address').click()
# input()
# driver.quit()

# find_element_by_xpath()

# ディスプレイ上
# tkinter での画面の構成
from tkinter import *
 
window = Tk()
window.geometry('550x400')
window.title("本日の天気情報です。")
today = datetime.datetime.now()
lbt = Label(window, text=today)
lbt1 = Label(window, text='Hello')
lbt.grid(column=0, row=0)
lbt1.grid(column=0, row=1)
window.mainloop()