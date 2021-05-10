<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/root">
        <html>
            <head>
                <title>book the extractor</title>
            </head>
            <body>
                <xsl:if test="incorrect">
                    <h3>Ezin da erreserbatu egun horretan</h3>
                </xsl:if>
                <form action="book.php" method="get">
                    <p>Enter the bin id</p>
                    <select name="latai">
                        <xsl:for-each select="capacidad/lata/id">
                            <option>
                                <xsl:attribute name="value">
                                    <xsl:value-of select="."/>
                                </xsl:attribute>
                                <xsl:value-of select="."/>
                            </option>
                        </xsl:for-each>
                    </select>
                    <br/>
                    <p>Enter the date(YYYY-MM-DD)</p>
                    <input type="text" name="diar"/>
                    <br/>
                    <button name="id">
                        <xsl:attribute name="value">
                            <xsl:value-of select="dni"/>
                        </xsl:attribute>
                        Submit
                    </button>
                </form>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
