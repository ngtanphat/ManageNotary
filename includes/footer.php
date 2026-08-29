</main>

    <!-- Toast Notification Container -->
    <div class="fixed bottom-4 right-4 z-50 flex flex-col gap-2" id="toast-container"></div>

    <!-- JS Core -->
    <script src="assets/js/core.js"></script>
    
    <!-- JS Module -->
    <?php if ($currentPage === 'hoso' || $currentPage === 'template'): ?>
        <script src="assets/js/pages/soanhoso.js"></script>
    <?php elseif ($currentPage === 'kekhaihoso'): ?>
        <script src="assets/js/pages/kekhaihoso.js"></script>
    <?php endif; ?>
    
</body>
</html>