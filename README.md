Web Filter External Enumeration Tool (WebFEET)
======================

WebFEET

Released as open source by NCC Group Plc - http://www.nccgroup.com/

Developed by Ben Williams

https://github.com/nccgroup/webfeet

Released under AGPL see LICENSE for more information

WebFEET is a web application for the drive-by enumeration of web security proxies and policies. See associated white paper: https://www.nccgroup.com/media/481438/whitepaper-ben-web-filt.pdf (Drive-by enumeration of web filtering solutions)

This tool was developed by Ben Williams, presented at BlackHat US 2014: https://www.blackhat.com/us-14/briefings.html#i-know-your-filtering-policy-better-than-you-do-external-enumeration-and-exploitation-of-email-and-web-security-solutions, and released as open source by NCC Group Plc.

The techniques used can help enumerate:

* Products or services used, sometimes with versions
* Detailed web filtering policy enumeration (and associated flaws in the policy and/or product/service capability)

This tool works in a drive-by way, using JavaScript to enumerate products and policy. It populates the DOM with the results, and POSTs the DOM back to the server for further analysis.

Further documented notes are available inline with the results page.


==== Current stable Beta version: ====

WebFEET (Beta version 0.6) Ben Williams, NCC Group 2014

Currently implemented features include:
* Client External IP and whois
* Managed service enumeration PoC (5 vendors currently)
* HTTP added header extraction
* Block-page recovery via EICAR
* Basic and extended file type download tests
* File extension download tests
* URL category filter enumeration via third-party image resource loading
* HTTPS MitM enumeration PoC
* HTTP/HTTPS POST-back of results
* Integrated HTTP and HTTPS tests (to identify weakness in lack of HTTPS inspection)
* Code/style improvements and NCC logo

[Download]
https://github.com/nccgroup/WebFEET/archive/master.zip

[Clone]
https://github.com/nccgroup/WebFEET.git

[Usage advice]
Usage of this application for enumerating targets without prior mutual consent may be considered an attack in some circumstances. Caution is advised and it remains your responsibility to obey applicable local, state, federal, national and international laws. NCC Group assume no liability and are not responsible for any misuse or damage caused by this application. 

Use this application with care. Arbitrary file uploads are possible (which by default are uploaded into the /tmp/ folder). These file uploads include block-pages and reports from target organisations, but the content is potentially under external control. Caution is advised when opening files. For the reports to be accurate, you should open the html files with a browser with JavaScript disabled (using the NoScript plugin for example) but it may also be advisable to check the files first to make sure they are text/HTML.

This version of the tool is designed to be dual purpose; presenting a report to the user, and uploading the same report to the server. To use this tool in an offensive drive-by manner, the index2.html file could be embedded in a hidden iframe (for example), and users could be sent a link to the page with the iframe (alternatively, the tool could be customised not to display a report to the user, and to send back a JSON array with the results, but that is beyond the scope of what was intended for this tool). 
