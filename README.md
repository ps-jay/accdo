Aurora CDD Output (accdo) - Troy Reynolds

These scripts retrieve the XML data from the Aurora Micro Inverter CDD unit and store it in a MySQL database.  It also has the ability to push the data to the pvoutput.org API.

It consits of 4 files:

accdo-config.php - The configuration file, edit to change MySQL Info, CDD info and pvoutput.org info.
accdo-install.php - Run once, this sets up the MySQL database table with the required fields.
accdo-fetch.php - Retrieves the data from the CDD via XML and stores it to the DB, run as often as you like via Cron.
accdo-push.php - Pushes the latest data stored in the DB to pvoutput.org run as often as you need via Cron. Note that the API is rate limited to 60 requests per hour so play nice.

These scripts were originally written for my own personal use, however I have decided to release into the public domain in the possibility that someone else may find this useful.

This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.

In jurisdictions that recognize copyright laws, the author or authors
of this software dedicate any and all copyright interest in the
software to the public domain. We make this dedication for the benefit
of the public at large and to the detriment of our heirs and
successors. We intend this dedication to be an overt act of
relinquishment in perpetuity of all present and future rights to this
software under copyright law.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
