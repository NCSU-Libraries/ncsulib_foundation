    var ingestPlus = 70781+84539+17381+16562+18189+66158+72016+67418+44018;     // updated weekly by M Peak, number to add to ingest count


    //for adding commas in numbers, taken from http://www.mredkj.com/javascript/nfbasic.html
    function addSeparatorsNF(nStr, inD, outD, sep)
    {
      nStr += "";
      var dpos = nStr.indexOf(inD);
      var nStrEnd = "";
      if (dpos != -1) {
        nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
        nStr = nStr.substring(0, dpos);
      }
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(nStr)) {
        nStr = nStr.replace(rgx, '$1' + sep + '$2');
      }
      return nStr + nStrEnd;
    }
    // to use later for finding the difference in time
    var d = new Date();



    jQuery(document).ready(function($) {
      $.ajax("http://catalog.lib.ncsu.edu/bookBot",
        {
          dataType:"jsonp",
          context:document.getElementById("block-block-65"),
          success:function (data, statusText, xhr) {
            $(this).find(".value").text(addSeparatorsNF(data.ingestedCount + ingestPlus, '.', '.', ','));
            // subtracting the last update time from the time now and round up the minute
            $(this).find(".updated").text( Math.ceil(((d - (data.lastUpdate))/1000)/60));
          }
        });
    });
