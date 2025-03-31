<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/lightbox/glightbox.min.js"></script>
<script src="assets/plugins/lightbox/lightbox.js"></script>
<script src="assets/js/script.js"></script>
<script>
 $(document).ready(function () {
    var path = window.location.pathname.split("/").pop().replace('.php', ''); 
    // console.log("Current path:", path);

    $(".sidebar-menu li.submenu").each(function () {
        var submenuParent = $(this); // The <li class="submenu">
        var mainLink = submenuParent.find("> a").first(); // Direct parent menu link
        var submenu = submenuParent.find("ul"); // The submenu <ul>
        var submenuLinks = submenu.find("a"); // All submenu <a> links

        var isSubmenuMatch = false;

        submenuLinks.each(function () {
            var linkHref = $(this).attr("href") || "";
            if (linkHref === path) {
                isSubmenuMatch = true;
                $(this).addClass("active"); // Highlight submenu link
            } else {
                $(this).removeClass("active"); // Ensure non-matching links are not active
            }
        });

        if (isSubmenuMatch) {
            // console.log("✅ Submenu Match:", mainLink.text().trim());
            submenuParent.addClass("active"); // Highlight parent <li>
            mainLink.addClass("active subdrop"); // Highlight parent <a>
            submenu.show(); // Keep submenu open
        } else {
            // console.log("❌ No match for:", mainLink.text().trim());
            submenuParent.removeClass("active"); 
            mainLink.removeClass("active subdrop");
            submenu.hide();
        }
    });
});




</script>