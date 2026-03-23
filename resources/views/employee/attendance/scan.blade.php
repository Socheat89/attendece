<x-layouts.employee page-title="Scan Attendance">

    <style>
        /* ── Clock ── */
        .scan-clock-wrap { text-align: center; padding: 1.5rem 0 1.2rem; }
        .scan-clock { font-family: 'Sora','Inter',sans-serif; font-size: 3rem; font-weight: 800;
            color: #0d1f35; letter-spacing: -.06em; line-height: 1; }
        .scan-date  { font-size: .88rem; color: #6b7d90; font-weight: 600; margin-top: .3rem; }

        /* ── Alert banners ── */
        .scan-alert { border-radius: 16px; padding: .9rem 1rem; display: flex; gap: .85rem;
            align-items: flex-start; border: 1px solid transparent; margin-bottom: 1rem; }
        .scan-alert-icon { width: 38px; height: 38px; border-radius: 50%; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center; }
        .scan-alert-icon svg { width: 18px; height: 18px; }
        .scan-alert.success { background: #ecfdf5; border-color: #a7f3d0; color: #065f46; }
        .scan-alert.success .scan-alert-icon { background: #d1fae5; color: #059669; }
        .scan-alert.error   { background: #fff1f2; border-color: #fecdd3; color: #9f1239; }
        .scan-alert.error   .scan-alert-icon { background: #ffe4e6; color: #e11d48; }
        .scan-alert h6 { font-size: .88rem; font-weight: 800; margin: 0 0 .15rem; }
        .scan-alert p  { font-size: .78rem; margin: 0; opacity: .9; }

        /* ── Big scan button ── */
        .scan-btn {
            width: 100%; border: 0; cursor: pointer;
            border-radius: 24px; padding: 2rem 1.2rem;
            display: flex; flex-direction: column; align-items: center; gap: .9rem;
            color: #fff; position: relative; overflow: hidden;
            box-shadow: 0 12px 36px rgba(0,0,0,.18);
            transition: transform .18s, box-shadow .18s, filter .18s;
        }
        .scan-btn:hover { transform: translateY(-2px); filter: brightness(1.06); }
        .scan-btn:active { transform: scale(.98); }
        .scan-btn .sb-qr-ring {
            width: 80px; height: 80px; border-radius: 22px;
            background: rgba(255,255,255,.18); border: 1.5px solid rgba(255,255,255,.25);
            display: flex; align-items: center; justify-content: center;
            backdrop-filter: blur(6px);
        }
        .scan-btn .sb-qr-ring svg { width: 44px; height: 44px; }
        .scan-btn h2 { font-family:'Sora','Inter',sans-serif; font-size: 1.5rem; font-weight: 800;
            letter-spacing: -.02em; margin: 0; }
        .scan-btn .sb-sub {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(0,0,0,.2); border: 1px solid rgba(255,255,255,.15);
            border-radius: 999px; padding: .35rem .85rem; font-size: .8rem; font-weight: 700;
        }
        .scan-btn .sb-sub svg { width: 15px; height: 15px; }
        .scan-btn::before { content:''; position:absolute; top:-40px; right:-40px;
            width:160px; height:160px; background:rgba(255,255,255,.1); border-radius:50%; }
        .scan-btn::after  { content:''; position:absolute; bottom:-30px; left:-20px;
            width:120px; height:120px; background:rgba(0,0,0,.08); border-radius:50%; }

        /* ── Camera box ── */
        .qr-camera-box {
            border-radius: 24px; overflow: hidden;
            background: #000;
            height: 72svh; max-height: 560px; min-height: 340px;
            box-shadow: 0 16px 48px rgba(0,0,0,.4);
            border: 3px solid #1e3050;
            position: relative;
        }
        /* lib injects div > div > video — force ALL of them to fill the box */
        #qrReader,
        #qrReader > div,
        #qrReader > div > div {
            width: 100% !important;
            height: 100% !important;
            min-height: 0 !important;
            max-height: none !important;
            padding: 0 !important;
        }
        #qrReader video {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
        }
        #qr-shaded-region,
        #qrReader img,
        #qrReader canvas { display: none !important; }

        .qr-overlay { position: absolute; inset: 0; z-index: 20; pointer-events: none;
            display: flex; flex-direction: column; justify-content: space-between; padding: 1.1rem; }

        .qr-status-bar {
            background: rgba(0,0,0,.65); backdrop-filter: blur(10px);
            border-radius: 12px; padding: .6rem 1rem; text-align: center;
            border: 1px solid rgba(255,255,255,.1);
        }
        .qr-status-bar p { color: #fff; font-size: .8rem; font-weight: 600; margin: 0; }

        .qr-frame {
            position: absolute; top: 50%; left: 50%;
            transform: translate(-50%,-50%);
            width: 220px; height: 220px;
            border: 2px solid rgba(255,255,255,.35); border-radius: 12px;
        }
        .qr-frame::before, .qr-frame::after,
        .qr-frame span::before, .qr-frame span::after {
            content: ''; position: absolute;
            width: 24px; height: 24px; border-color: #34d399; border-style: solid;
        }
        .qr-frame::before  { top: -2px; left: -2px; border-width: 3px 0 0 3px; border-radius: 4px 0 0 0; }
        .qr-frame::after   { top: -2px; right: -2px; border-width: 3px 3px 0 0; border-radius: 0 4px 0 0; }
        .qr-frame span::before { bottom: -2px; left: -2px; border-width: 0 0 3px 3px; border-radius: 0 0 0 4px; }
        .qr-frame span::after  { bottom: -2px; right: -2px; border-width: 0 3px 3px 0; border-radius: 0 0 4px 0; }

        .qr-type-sel {
            pointer-events: auto;
            background: rgba(0,0,0,.8); backdrop-filter: blur(14px);
            border-radius: 18px; padding: 6px; border: 1px solid rgba(255,255,255,.1);
            display: grid; grid-template-columns: 1fr 1fr; gap: 6px;
        }
        .qr-type-btn {
            border: 0; border-radius: 13px; padding: .75rem .5rem;
            font-size: .78rem; font-weight: 800; cursor: pointer; transition: all .18s;
            background: rgba(255,255,255,.1); color: rgba(255,255,255,.65); letter-spacing: .04em;
        }
        .qr-type-btn:hover { background: rgba(255,255,255,.2); }
        .qr-type-btn.active-in  { background: #059669; color: #fff; box-shadow: 0 4px 12px rgba(5,150,105,.4); }
        .qr-type-btn.active-out { background: #2563eb; color: #fff; box-shadow: 0 4px 12px rgba(37,99,235,.4); }

        .qr-cancel {
            position: absolute; top: 1rem; right: 1rem; z-index: 30;
            width: 36px; height: 36px; border-radius: 50%; border: 0; cursor: pointer;
            background: rgba(0,0,0,.55); color: #fff; backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center; pointer-events: auto;
        }
        .qr-cancel svg { width: 18px; height: 18px; }

        /* ── All done ── */
        .all-done-card {
            background: #ecfdf5; border: 1px solid #a7f3d0;
            border-radius: 22px; padding: 3rem 1.5rem; text-align: center;
        }
        .all-done-icon { width: 72px; height: 72px; border-radius: 50%;
            background: #d1fae5; color: #059669;
            display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; }
        .all-done-icon svg { width: 36px; height: 36px; }
        .all-done-card h2 { font-family:'Sora','Inter',sans-serif; font-size: 1.5rem;
            font-weight: 800; color: #064e3b; margin: 0 0 .5rem; }
        .all-done-card p { font-size: .85rem; color: #047857; margin: 0; line-height: 1.6; }

        /* ── Activity timeline ── */
        .activity-card { background: #fff; border: 1px solid #dce8f6; border-radius: 20px;
            overflow: hidden; box-shadow: 0 2px 12px rgba(13,31,53,.06); }
        .activity-head { padding: .85rem 1.1rem; border-bottom: 1px solid #f0f5fa; background: #f8fbff; }
        .activity-head h3 { font-size: .75rem; font-weight: 800; color: #546270; margin: 0;
            text-transform: uppercase; letter-spacing: .07em; }
        .activity-row { display: flex; align-items: center; gap: .85rem;
            padding: .85rem 1.1rem; border-bottom: 1px solid #f5f8fc; transition: background .12s; }
        .activity-row:last-child { border-bottom: 0; }
        .activity-row:hover { background: #f8fbff; }
        .act-icon-wrap { width: 38px; height: 38px; border-radius: 12px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center; }
        .act-icon-wrap svg { width: 17px; height: 17px; }
        .act-icon-wrap.in      { background: #dcfce7; color: #15803d; }
        .act-icon-wrap.out     { background: #dbeafe; color: #1d4ed8; }
        .act-icon-wrap.pending { background: #f1f5f9; color: #94a3b8; }
        .act-label { font-size: .84rem; font-weight: 700; color: #0d1f35; }
        .act-sub   { font-size: .71rem; color: #8294a8; margin-top: .1rem; }
        .act-time  { font-family:'Sora','Inter',sans-serif; font-size: .92rem; font-weight: 800; color: #0d1f35; }
        .act-status { font-size: .68rem; font-weight: 700; margin-top: .1rem; }
        .act-status.late { color: #d97706; }
        .act-status.on-time { color: #16a34a; }

        #scanMsg { border-radius: 14px; padding: .85rem 1rem; font-size: .82rem; font-weight: 600; text-align: center; }
        #scanMsg.info  { background: #eff6ff; color: #1d4ed8; }
        #scanMsg.error { background: #fff1f2; color: #be123c; }
    </style>

<div style="max-width:520px;margin:0 auto;padding-bottom:5rem">

    <!-- Clock -->
    <div class="scan-clock-wrap" id="scanHeader">
        <div class="scan-clock" id="liveClock">--:--:--</div>
        <div class="scan-date" id="liveDate"></div>
    </div>

    <!-- Flash: scan result -->
    @if(session('scan_result'))
        @php $res = session('scan_result'); @endphp
        <div class="scan-alert {{ $res['type'] === 'success' ? 'success' : 'error' }}" id="scanResult">
            <div class="scan-alert-icon">
                @if($res['type'] === 'success')
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                @else
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                @endif
            </div>
            <div>
                <h6>{{ $res['type'] === 'success' ? (($res['scan_type'] ?? 'Scan') . ' Recorded') : 'Scan Rejected' }}</h6>
                @if($res['type'] === 'success')
                    <p>{{ $res['time'] ?? '' }}{{ !empty($res['status']) ? ' · ' . $res['status'] : '' }}{{ !empty($res['distance']) ? ' · ' . $res['distance'] . ' away' : '' }}</p>
                @else
                    <p>{{ $res['message'] ?? 'Could not record attendance.' }}</p>
                @endif
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="scan-alert error" id="scanResult">
            <div class="scan-alert-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
            </div>
            <div><h6>Error</h6><p>{{ $errors->first() }}</p></div>
        </div>
    @endif

    <!-- Hidden form -->
    <form method="POST" action="{{ route('employee.attendance.store') }}" id="scanForm" style="display:none">
        @csrf
        <input type="hidden" name="scan_type"   id="scanTypeInput" value="">
        <input type="hidden" name="device_info" id="deviceInfo" value="">
        <input type="hidden" name="qr_token"    id="qrTokenInput" value="">
        <input type="hidden" name="latitude"    id="latInput" value="">
        <input type="hidden" name="longitude"   id="lngInput" value="">
    </form>

    <!-- Scan area -->
    @if(!$allDone)
        @php
            $ciTypes = ['morning_in', 'lunch_in'];
            $isCheckIn = in_array($autoDefault, $ciTypes);
            $actionLabel = $isCheckIn ? 'Check In' : 'Check Out';
            $btnGradient = $isCheckIn
                ? 'linear-gradient(135deg,#059669,#0f766e)'
                : 'linear-gradient(135deg,#2563eb,#1d4ed8)';
        @endphp

        <button type="button" id="btnScan" class="scan-btn mb-3" style="background:{{ $btnGradient }}">
            <div class="sb-qr-ring">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="5" height="5" rx="1"/><rect x="16" y="3" width="5" height="5" rx="1"/><rect x="3" y="16" width="5" height="5" rx="1"/>
                    <line x1="16" y1="16" x2="21" y2="16"/><line x1="16" y1="19" x2="19" y2="19"/><line x1="19" y1="16" x2="19" y2="21"/>
                </svg>
            </div>
            <h2>ស្កេន QR កូដ (Scan QR Code)</h2>
            <span class="sb-sub" id="btnScanSub">
                @if($isCheckIn)
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14"/></svg>
                @else
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7"/></svg>
                @endif
                {{ $actionLabel }}
            </span>
        </button>

        <!-- Camera box (hidden initially) -->
        <div id="qrBox" class="qr-camera-box mb-3" style="display:none">
            <div id="qrReader"></div>
            <div class="qr-overlay">
                <div class="qr-status-bar">
                    <p id="qrStatus">តម្រឹម QR Code ក្នុងស៊ុម (Align QR code)</p>
                </div>
                <div class="qr-frame"><span></span></div>
                <div class="qr-type-sel" id="typeSel">
                    @if($nextCheckIn)
                    <button type="button" class="qr-type-btn {{ $autoDefault == $nextCheckIn ? 'active-in' : '' }}" id="typeOptIn" data-type="{{ $nextCheckIn }}">ចូល (CHECK IN)</button>
                    @endif
                    @if($nextCheckOut)
                    <button type="button" class="qr-type-btn {{ $autoDefault == $nextCheckOut ? 'active-out' : '' }}" id="typeOptOut" data-type="{{ $nextCheckOut }}">ចេញ (CHECK OUT)</button>
                    @endif
                </div>
            </div>
            <button type="button" class="qr-cancel" onclick="window.cancelScan()">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

    @else
        <div class="all-done-card mb-3">
            <div class="all-done-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h2>រួចរាល់ទាំងអស់! (All set!)</h2>
            <p>អ្នកបានស្កេនចប់សព្វគ្រប់សម្រាប់ថ្ងៃនេះហើយ។ <br>សូមមានថ្ងៃដ៏ល្អ។ (Have a great rest of your day)</p>
        </div>
    @endif

    <div id="scanMsg" style="display:none"></div>

    <!-- Today's Activity -->
    <div class="activity-card" id="scanSummary">
        <div class="activity-head">
            <h3>សកម្មភាពថ្ងៃនេះ (Today's Activity)</h3>
        </div>
        @php
            $summaryRowsMap = [
                'morning_in'  => ['label' => 'Morning In',   'type' => 'in'],
                'lunch_out'   => ['label' => 'Lunch Out',    'type' => 'out'],
                'lunch_in'    => ['label' => 'Afternoon In', 'type' => 'in'],
                'evening_out' => ['label' => 'Evening Out',  'type' => 'out'],
            ];
            $summaryRows = collect($scanFlow ?? ['morning_in', 'lunch_out', 'lunch_in', 'evening_out'])
                ->mapWithKeys(fn ($type) => [$type => $summaryRowsMap[$type]])->all();
        @endphp
        @foreach($summaryRows as $key => $row)
            @php $log = $todayLogs->get($key); @endphp
            <div class="activity-row">
                <div class="act-icon-wrap {{ $log ? $row['type'] : 'pending' }}">
                    @if($row['type'] === 'in')
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14"/></svg>
                    @else
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7"/></svg>
                    @endif
                </div>
                <div style="flex:1;min-width:0">
                    <div class="act-label">{{ $row['label'] }}</div>
                    <div class="act-sub">{{ $log ? 'Scanned' : 'Not scanned yet' }}</div>
                </div>
                <div style="text-align:right">
                    @if($log)
                        <div class="act-time">{{ $log->scanned_at?->format('h:i A') }}</div>
                        <div class="act-status {{ strtolower($log->status_text ?? '') == 'late' ? 'late' : 'on-time' }}">{{ $log->status_text ?? 'On Time' }}</div>
                    @else
                        <div class="act-time" style="color:#c4d0dc">--:--</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@if(in_array($scanMode, ['qr','gps_qr']))
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
@endif

<script>
document.addEventListener('DOMContentLoaded', () => {
    function tick() {
        const n = new Date();
        const c = document.getElementById('liveClock'), d = document.getElementById('liveDate');
        if(c) c.textContent = n.toLocaleTimeString([],{hour:'2-digit',minute:'2-digit',second:'2-digit'});
        if(d) d.textContent = n.toLocaleDateString([],{weekday:'long',year:'numeric',month:'long',day:'numeric'});
    }
    tick(); setInterval(tick, 1000);

    const form = document.getElementById('scanForm');
    const typeInput = document.getElementById('scanTypeInput'), qrTokenInput = document.getElementById('qrTokenInput');
    const latInp = document.getElementById('latInput'), lngInp = document.getElementById('lngInput');
    const deviceInfo = document.getElementById('deviceInfo');
    const btnScan = document.getElementById('btnScan'), btnScanSub = document.getElementById('btnScanSub');
    const qrBox = document.getElementById('qrBox'), scanHeader = document.getElementById('scanHeader');
    const scanSummary = document.getElementById('scanSummary'), scanResultEl = document.getElementById('scanResult');
    const qrStatus = document.getElementById('qrStatus'), scanMsg = document.getElementById('scanMsg');
    const typeOptIn = document.getElementById('typeOptIn'), typeOptOut = document.getElementById('typeOptOut');

    if(deviceInfo) deviceInfo.value = navigator.userAgent;
    const SCAN_MODE = '{{ $scanMode }}', AUTO_DEFAULT = '{{ $autoDefault }}';
    const NEXT_CI = '{{ $nextCheckIn ?? "" }}', NEXT_CO = '{{ $nextCheckOut ?? "" }}';
    const NEEDS_GPS = SCAN_MODE==='gps'||SCAN_MODE==='gps_qr', NEEDS_QR = SCAN_MODE==='qr'||SCAN_MODE==='gps_qr';
    let currentType = AUTO_DEFAULT, scanner = null, isScanning = false, isSubmitting = false;

    function showMsg(text,type='info'){scanMsg.className=type;scanMsg.textContent=text;scanMsg.style.display='block';}
    function hideMsg(){scanMsg.style.display='none';}

    function setScanMode(active) {
        if(active){
            if(btnScan) btnScan.style.display='none';
            if(scanHeader) scanHeader.style.display='none';
            if(scanSummary) scanSummary.style.display='none';
            if(scanResultEl) scanResultEl.style.display='none';
            if(qrBox) qrBox.style.display='block';
        } else {
            if(qrBox) qrBox.style.display='none';
            if(btnScan) btnScan.style.display='';
            if(scanHeader) scanHeader.style.display='';
            if(scanSummary) scanSummary.style.display='';
            if(scanResultEl) scanResultEl.style.display='';
        }
    }

    function setActiveType(type) {
        if(!type) return; currentType=type; typeInput.value=type;
        if(typeOptIn)  typeOptIn.className  = 'qr-type-btn'+(type===NEXT_CI?' active-in':'');
        if(typeOptOut) typeOptOut.className = 'qr-type-btn'+(type===NEXT_CO?' active-out':'');
    }
    if(typeOptIn)  typeOptIn.addEventListener('click',()=>setActiveType(NEXT_CI));
    if(typeOptOut) typeOptOut.addEventListener('click',()=>setActiveType(NEXT_CO));
    setActiveType(AUTO_DEFAULT);

    function getGps(){
        return new Promise(resolve=>{
            if(!navigator.geolocation){resolve(false);return;}
            navigator.geolocation.getCurrentPosition(
                pos=>{latInp.value=pos.coords.latitude.toFixed(6);lngInp.value=pos.coords.longitude.toFixed(6);resolve(true);},
                ()=>resolve(false),{enableHighAccuracy:true,timeout:10000,maximumAge:0});
        });
    }

    async function startScanner(){
        if(isScanning) return; hideMsg();
        try{
            setScanMode(true); isScanning=true; qrStatus.textContent='Requesting camera access…';
            if(!scanner) scanner=new Html5Qrcode('qrReader');
            await scanner.start({facingMode:'environment'},{fps:10,qrbox:{width:220,height:220}},
                async decoded=>{
                    if(isSubmitting) return; isSubmitting=true;
                    try{await scanner.stop();}catch(e){} isScanning=false;
                    qrStatus.textContent='Processing…';
                    qrTokenInput.value=decoded.trim(); typeInput.value=currentType;
                    if(NEEDS_GPS){qrStatus.textContent='Getting location…';const ok=await getGps();if(!ok){isSubmitting=false;setScanMode(false);showMsg('Location access denied. Please enable GPS.','error');return;}}
                    qrStatus.textContent='Submitting…'; form.submit();
                },()=>{});
            qrStatus.textContent='Align QR code within the frame';
        } catch(err){
            isScanning=false; setScanMode(false);
            let msg='Could not access camera.';
            if(err.name==='NotAllowedError') msg='Camera permission denied.';
            else if(err.name==='NotFoundError') msg='No camera found.';
            else if(location.protocol!=='https:'&&location.hostname!=='localhost') msg='HTTPS is required for camera access.';
            showMsg(msg,'error');
        }
    }

    window.cancelScan = async function(){
        if(scanner&&isScanning){try{await scanner.stop();}catch(e){}}
        isScanning=false; isSubmitting=false; setScanMode(false); hideMsg();
    };

    if(btnScan){
        btnScan.addEventListener('click',()=>{
            if(NEEDS_QR){startScanner();return;}
            (async()=>{
                if(btnScan.disabled) return; btnScan.disabled=true;
                if(btnScanSub) btnScanSub.textContent='Locating…';
                const ok=await getGps();
                if(ok){typeInput.value=currentType;form.submit();}
                else{btnScan.disabled=false;showMsg('Location access denied.','error');}
            })();
        });
    }
});
</script>

</x-layouts.employee>