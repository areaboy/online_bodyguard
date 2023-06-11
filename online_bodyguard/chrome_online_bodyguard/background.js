chrome.webNavigation.onCompleted.addListener(



  async () => {
   // await chrome.action.openPopup();

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

