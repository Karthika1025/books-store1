from tkinter import*
import backnd
window=Tk()
def get_selected_row(event):
try:
global select_tup
index=list1.curselection()&#91;0]
select_tup=list1.get(index)
e1.delete(0,END)
e1.insert(END, select_tup&#91;1])
e2.delete(0,END)
e2.insert(END, select_tup&#91;2])
e3.delete(0,END)
e3.insert(END, select_tup&#91;3])
e4.delete(0,END)
e4.insert(END, select_tup&#91;4])
except IndexError:
pass
def view_command():
list1.delete(0,END)
for row in backend.view():
list1.insert(END,row)
def search_command():
list1.delete(0,END)
for row in backend.search(title_text.get(),year_text.get(),isbn_text.get()):
list1.insert(END,row)
def add_book():
backend.insert(title_text.get(), author_text.get(),year_text.get(),isbn_text.get())
list1.delete(0,END)
list1.insert(END,(title_text.get(), author_text.get(),year_text.get(),isbn_text.get()))
def delete_book():
backend.delete(select_tup&#91;0])
def update_book():
backend.update(select_tup&#91;0]), title_text.get(), author_text.get(),year_text.get(),isbn_text.get())
window.wm_title("Book store")
l1=label(window,text="Title")
l1.grid(row=0, column=0)
l2=label(window, text="Author")
l2.grid(row=0, column=2)
l3=Label(window, text="year")
l3.grid(row=1, column=0)
l4=Label(window, text="ISBN")
l4.grid(row=1, column=2)
title_text=stringVar()
e1=Entry(window, textvariable=title_text)
e1.grid(row=0, column=1)
author_text=stringvar()
e2=Entry(window, textvariable=author_text)
e2.grid(row=0, column=3)
year_text_stringVar()
e3=Entry(window, textvariable=year_text)
e3.grid(row=1, column=1)
isbn_text=stringVar()
e4=Entry(window, textvariable=isbn_text)
e4.grid(row=1, column=3)
list1=Listbox(window, height=6, width=35)
list1.grid(row=2, column=0, rowspan=6, columnspan=2)
list1.bind("&lt;&lt;Listboxselect&gt;&gt;",gget_selected_row)
sb1=scrollbar(window)
sb1.grid(row=2, column=2, rowspan=6)
list1.configure(yscrollcommand=sb1.set)
sb1.configure(command=list1.yview)
b1=Button(window, text="View All", width=12,
command=view_command)
b1.grid(row=2, column=3)
b2=Button(window, text="search Book", width=12, command=search_command)
b2.grid(row=3, column=3)
b3=Button(window, text="Add Book", width=12, command=add_book)
b3.grid(row=4, column=3)
b4=Button(window, text="update", width=12, command=update_book)
b4.grid(row=5, column=3)
b5=Button(window,text="Delete", width=12, command=delete_book)
b5.grid(row=6, column=3)
b6=Button(window,text="close", width=12, command=window.destroy)
b6.grid(row=7, column=3)
window.mainloop()
