<script type="text/javascript">
    $(function () {

      /*------------------------------------------
       --------------------------------------------
       Pass Header Token
       --------------------------------------------
       --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      /*------------------------------------------
      --------------------------------------------
      Render DataTable
      --------------------------------------------
      --------------------------------------------*/

      def pretty(d, indent=0, indent_before=0):
    html_code = ''
    for key, value in d.items():
            
        if indent > indent_before:
            html_code += """
            <div id="collapse-1-1" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-1">
                    <div class="card-body">
                    <div id="accordion-1-1">
            """
        elif indent == indent_before:
            html_code += """
            </div>
            """
        else:
            html_code += """
            </div>
            """*indent

        html_code +="""
            <div class="card">
                <div class="card-header" id="heading-{}">
                    <h5 class="mb-0">
                    <a role="button" data-toggle="collapse" href="#collapse-{}" aria-expanded="false" aria-controls="collapse-{}">
                            {}
                    </a>
                    </h5>
                </div>
        """.format(key ,key, key, key, indent)
        #print('\t' * (indent) + str(key) + '({})({})\n'.format(indent,indent_before))
        if isinstance(value, dict):
            html_code  += pretty(value, indent+1, indent) 
        else:
            print('\t' * (indent+1) + str(value))

    return html_code
        
msg = pretty(result)
print(msg)
   
}

</script>