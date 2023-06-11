# Online Body Guard

A chrome Extension **Standalone and Built-in(Dual Purpose Interface)** app that protects and verifies users data against **malicious url link Clicking, 
use of Breached Email Address, Password or Phone Number** powered by  **Pangea URL INTEL and USER INTEL API** respectively.


# Its design has Dual Purpose Interface App

1.) As a chrome Extension **Standalone App**, It Protects and Verify your Data that across all Social Networks like **Gmail, Facebook, Instagram, TikTok, Twitter etc.** 
without leaving **Gmail, Facebook, Instagram, TikTok, Twitter etc.** website respectively.

The Application runs **natively** within and inside each of the above mentioned Social Network or any other configured website via Apps Chrome **background.js** file.

For instance, Each time your open your **Facebook App, Gmail etc.** from a Chrome Browser,the application will automatically popup and runs natively as a standalone app within each of the site.


2.) As a Chrome Extension **Builtin App**, the App runs directly from Chrome Browser by accessing the App from **Chrome Extension Icon** on the Chrome Browser.



# How To Test the Application:

The application contain 2 major folder.  The main folder **online_bodyguard** which contains php backend Codes and **Chrome_online_bodyguard** which is located inside
the main application folder.  The **Chrome_online_bodyguard** is the chrome Extension front end



# Setting Chrome Extension Front End


1.) Once You Download the Code from Github, copy **chrome_online_bodyguard** folder which contains frontend Chrome Extension Codes to any folder/directory of your choice.

At **chrome_online_bodyguard** folder. goto **scrip**t folder, then open **app_script.js** and edit the web URL(Eg. http://localhost/online_bodyguard/) in each of the  Jquery-Ajax Code 
to ensure it points to the actual php backend Codes based on your site URL.



**Optionally**, You can also Locate and edit **background.js** file if its necessary as per code below to add or reove more URL link or better leave it the way it is.

 As Chrome Extension **Standalone App**, Each time your open your **Facebook, Gmail, Instagram, Twitter Site etc.** from a Chrome Browser,  the application will automatically popup and runs natively as a standalone app within each of the listed site url below

```chrome.webNavigation.onCompleted.addListener(
  async () => {
await chrome.windows.create({
    url: chrome.runtime.getURL('index.html'),
    width: 500,
    height: 600,
    type: 'popup'
  });

  },
  { url: [
    { urlMatches: 'https://www.gmail.com/' },
{ urlMatches: 'https://mail.google.com/*' },
{ urlMatches: 'https://web.facebook.com/' },
{ urlMatches: 'https://www.instagram.com/' },
{ urlMatches: 'https://twitter.com/' },
{ urlMatches: 'https://www.tiktok.com/*' },
  ] },
);
```


For instance, url **https://twitter.com/** tells the Chrome Apps to run natively as a standalone app on that site each time the Url is accessed. 
To make the Chrome run natively on all twitter url, you should add asterisk **(*)** to the url something like https://twitter.com/*.

You can try More **URL Matching** based on the Site where you want the Chrome to popup/run natively.



2.) open chrome browser. goto **Manage Extension --Click on Load Unpacked --> Select chrome_online_bodyguard** folder. Ensure that it gets loaded.
 You will see the Chrome extension app(**online_bodyguard**) within the Chrome Extension Dashboard

Remember, whenever you edit any of the Chrome Extension apps script, always click on **Reload/Refresh** icon on the side of the app within the Chrome extension Page/Dashboard.



Alternatively,You can go directly to Chrome extension Page/dashboard by typing **chrome://extensions/** at the chrome browser url



# Setting up backend which was written in PHP etc.



3.)You will need to install **Xampp Server**. After installation, ensure that **PHP** is installed and that **Apache Server** has been started and Running from Xampp Control Panel.


4.) copy main application folder **online_bodyguard** which contains the backend Code to **htdocs** of the Xammp server. Eg. **C:\xampp\htdocs\online_bodyguard**



5.) Edit **Settings.php** to update your **Pangea User Intel and URL Intel  Access Token**  where appropriates and you are done with backend.  Its is time to test the app.


6.) To access the app as a **Builtin** Chrome Extension App, Callup the Chrome Browser, Locate Chrome Extension Icon and click on **online_bodyguard** Apps on Chrome Browser and application will start running. Thanks.. 


To Access the app as a **Standalone** Chrome Extension App, Try accessing any of  the configured Social networks site url like  **https://twitter.com/,  https://www.instagram.com/ etc.**
 and you will see the app automatically Popup and running natively inside **Twitter or Instagram** site respectively.
 
 As a Standalone app, You can drag the app to any direction, Maximize It, Minimize it and even close it when not needed within the site.





Just a Tip.

# How I Integrate Pangea User Intel and URL Intel API respectively within Online Body Guard System


1.) Verification/Checking of URL Links for Malicious/Suspicious Intent leverages Pangea Url Intel API.

https://pangea.cloud/docs/api/url-intel#reputation


2.) Verification/Checking of Users Email Address, Phone Numbers, Password for data Breaches/compromise leverages Pangea User Intel API.

https://pangea.cloud/docs/api/user-intel#look-up-breached-users

https://pangea.cloud/docs/api/user-intel#look-up-breached-passwords






