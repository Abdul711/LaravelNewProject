set shell = WScript.CreateObject("WScript.Shell")
dim message 
message ="hi"
shell.run("https://api.whatsapp.com/send/?phone=923222294494&text="&message)
WScript.sleep(5000)
shell.SendKeys"{ENTER}"
