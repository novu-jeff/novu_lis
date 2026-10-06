@extends('layouts.whitepaper')

@section('hero')
    <p class="wp-eyebrow">LIS White Paper</p>
    <p class="wp-hero-sub">Legislative portal architecture, document lifecycle, and integration controls</p>
    <h1>A unified public layer for Sangguniang Bayan information, member workflows, and legislative documents</h1>
    <p class="wp-hero-desc">
        This white paper describes the Legislative Information System (LIS) as the public-facing portal for
        deploying local government units (LGUs). It connects citizen and council visibility with CMS-managed content and
        DMS-stored legislative records, informed by the current Laravel implementation, routes, and integration patterns.
    </p>
    <p class="wp-audience">Documentation for LGU stakeholders, implementers, and technical reviewers</p>
    <div class="wp-meta-grid">
        <div class="wp-meta-card"><div class="label">Platform role</div><div class="value">Public legislative portal</div></div>
        <div class="wp-meta-card"><div class="label">Portals</div><div class="value">Public + SB members</div></div>
        <div class="wp-meta-card"><div class="label">Content source</div><div class="value">CMS + DMS</div></div>
        <div class="wp-meta-card"><div class="label">Documents</div><div class="value">Ordinances, resolutions, reports</div></div>
    </div>
@endsection

@section('toc')
    <li><a href="#section-1">1. Platform overview</a></li>
    <li><a href="#section-2">2. System participants</a></li>
    <li><a href="#section-3">3. Legislative workflow lifecycle</a></li>
    <li><a href="#section-4">4. Integration routing</a></li>
    <li><a href="#section-5">5. Public reporting framework</a></li>
    <li><a href="#section-6">6. External integrations</a></li>
    <li><a href="#section-7">7. System architecture</a></li>
    <li><a href="#section-8">8. Security and access controls</a></li>
    <li><a href="#section-9">9. Risk management framework</a></li>
    <li><a href="#section-10">10. Operational resilience</a></li>
    <li><a href="#section-11">11. Platform role summary</a></li>
@endsection

@section('content')
    <section id="section-1">
        <h2>1. Platform overview</h2>
        <p class="section-lead">Role in municipal legislative digital service delivery</p>
        <p>
            LIS operates as the public legislative portal for the deploying LGU, connecting council information,
            SB member document workflows, session visibility, and DMS-backed legislative reports. The system is
            implemented as a Laravel application with public web routes and API proxy routes for CMS content.
        </p>
        <p>
            Unlike a standalone document viewer, LIS maintains member authentication, document forwarding to the
            SB Secretary (via CMS), session agenda access, and public report pages fed from the Document Management System.
        </p>
        <h3>Core platform functions</h3>
        <ul>
            <li>Public portal for members, standing committees, district assignments, organization chart, calendar, and barangay officials.</li>
            <li>SB member portal for document upload, forward, edit, and session agenda viewing.</li>
            <li>Legislative document reports: committee reports, resolutions, ordinances, session meetings, executive orders.</li>
            <li>CMS content proxy and secondary database connection for session and meeting data.</li>
            <li>Live stream page for session broadcasts when configured in CMS.</li>
        </ul>
    </section>

    <section id="section-2">
        <h2>2. System participants</h2>
        <p class="section-lead">Distinct roles in legislative information and document processing</p>
        <h3>Public visitors</h3>
        <p>Browse council information, legislative documents, photo journals, and calendar events without authentication.</p>
        <h3>Sangguniang Bayan members</h3>
        <p>Log in via the member guard to upload documents, forward items to the SB Secretary, and view session agendas and remarks.</p>
        <h3>CMS staff and SB Secretary</h3>
        <p>Manage content, approve forwarded documents, build session agendas, and publish minutes through the LIS CMS back-office.</p>
        <h3>DMS administrators</h3>
        <p>Maintain the legislative document repository consumed by LIS report pages via API and storage URLs.</p>
    </section>

    <section id="section-3">
        <h2>3. Legislative workflow lifecycle</h2>
        <p class="section-lead">From member document submission to public visibility</p>
        <div class="wp-flow">
            <span class="wp-flow-item">Member upload</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">Forward to secretary</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">CMS review</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">Session agenda</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">Public reports</span>
        </div>
        <div class="wp-steps">
            <div class="wp-step">
                <span class="step-num">1</span>
                <div>
                    <h4>Document initiation</h4>
                    <p>An SB member creates a document record through the member dashboard and uploads supporting files.</p>
                </div>
            </div>
            <div class="wp-step">
                <span class="step-num">2</span>
                <div>
                    <h4>Forward to secretary</h4>
                    <p>The member forwards the document; status moves to the secretary queue in CMS for review and session assignment.</p>
                </div>
            </div>
            <div class="wp-step">
                <span class="step-num">3</span>
                <div>
                    <h4>Secretary approval</h4>
                    <p>Authorized secretary users approve documents and attach them to session meetings with agenda ordering.</p>
                </div>
            </div>
            <div class="wp-step">
                <span class="step-num">4</span>
                <div>
                    <h4>Session conduct</h4>
                    <p>Agenda items, minutes, remarks, and live session settings are managed in CMS; members view agendas in LIS.</p>
                </div>
            </div>
            <div class="wp-step">
                <span class="step-num">5</span>
                <div>
                    <h4>Legislative publishing</h4>
                    <p>Final ordinances, resolutions, and related records are stored in DMS and exposed on LIS public report pages.</p>
                </div>
            </div>
            <div class="wp-step">
                <span class="step-num">6</span>
                <div>
                    <h4>Public visibility</h4>
                    <p>Citizens and staff access published legislative documents and council information through the public portal.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="section-4">
        <h2>4. Integration routing</h2>
        <p class="section-lead">CMS proxy, database connection, and DMS document feeds</p>
        <p>
            LIS integrates with CMS through <code>CmsProxyController</code> for storage and API routes, and a
            <code>cms_mysql</code> database connection for session meetings and related records. DMS integration
            uses configured API and storage URLs to fetch documents for report pages.
        </p>
        <h3>CMS content flow</h3>
        <div class="wp-flow">
            <span class="wp-flow-item">LIS public page</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">CMS API / proxy</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">Members, journals, calendar</span>
        </div>
        <h3>DMS document flow</h3>
        <div class="wp-flow">
            <span class="wp-flow-item">LIS report page</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">GET /api/getdocuments</span>
            <span class="wp-flow-arrow">→</span>
            <span class="wp-flow-item">DMS storage URL</span>
        </div>
    </section>

    <section id="section-5">
        <h2>5. Public reporting framework</h2>
        <p class="section-lead">Legislative document categories exposed on the portal</p>
        <div class="wp-data-cards">
            <div class="wp-data-card">
                <h4>Committee reports</h4>
                <p>DMS type 1 — committee report documents with public listing and download.</p>
            </div>
            <div class="wp-data-card">
                <h4>Resolutions</h4>
                <p>DMS type 2 — council resolutions searchable by year and month.</p>
            </div>
            <div class="wp-data-card">
                <h4>Ordinances</h4>
                <p>DMS type 3 — municipal ordinances published for public access.</p>
            </div>
            <div class="wp-data-card">
                <h4>Session meetings</h4>
                <p>DMS type 4 — session-related documents linked to council meetings.</p>
            </div>
        </div>
        <h3>Additional public modules</h3>
        <ul>
            <li>Executive orders report page.</li>
            <li>Photo journals and galleries proxied from CMS.</li>
            <li>Live stream integration when CMS live session is enabled.</li>
        </ul>
    </section>

    <section id="section-6">
        <h2>6. External integrations</h2>
        <p class="section-lead">CMS API, DMS API, and storage connectivity</p>
        <ul>
            <li><code>APP_API_URL</code> / <code>CMS_API_URL</code> — CMS endpoints for members, committees, photo journals, and organization data.</li>
            <li><code>DMS_API_URL</code> / <code>DMS_STORAGE_URL</code> — document listing and file serving for report pages.</li>
            <li><code>storage/{path}</code> — LIS proxy route to CMS storage for consistent asset delivery.</li>
        </ul>
    </section>

    <section id="section-7">
        <h2>7. System architecture</h2>
        <p class="section-lead">Application and data structure</p>
        <h3>Presentation layer</h3>
        <p>Blade views for public portal (<code>/</code>, members, reports) and SB member portal (<code>/sb-members/*</code>), plus this white paper page.</p>
        <h3>Application layer</h3>
        <p>Controllers, CMS proxy, member authentication, session controllers, and API routes for CMS data feeds.</p>
        <h3>Data layer</h3>
        <p>LIS-local tables for member documents and remarks; CMS database connection for sessions; DMS API for published documents.</p>
        <div class="wp-arch-grid">
            <div class="wp-arch-item">Public portal</div>
            <div class="wp-arch-item">SB members</div>
            <div class="wp-arch-item">CMS proxy</div>
            <div class="wp-arch-item">cms_mysql</div>
            <div class="wp-arch-item">DMS reports</div>
            <div class="wp-arch-item">Live stream</div>
        </div>
    </section>

    <section id="section-8">
        <h2>8. Security and access controls</h2>
        <p class="section-lead">Governance, permissions, and integration integrity</p>
        <ul>
            <li>Dual authentication guards: <code>web</code> for standard users and <code>member</code> for SB member accounts.</li>
            <li>Member routes protected by <code>auth:member</code> middleware on dashboard, documents, and sessions.</li>
            <li>Server-side CMS proxy avoids browser SSL certificate issues when fetching CMS assets.</li>
            <li>CSRF protection on member forms; public report pages are read-only.</li>
            <li>DMS document access levels enforced at repository; LIS consumes public listings per deployment policy.</li>
        </ul>
    </section>

    <section id="section-9">
        <h2>9. Risk management framework</h2>
        <p class="section-lead">Operational, security, and integration risk controls</p>
        <h3>Operational risk</h3>
        <p>Mitigated through document status tracking (draft, forwarded, approved) and secretary approval queues in CMS.</p>
        <h3>Access risk</h3>
        <p>Separate member and staff authentication; member documents scoped to authenticated SB accounts.</p>
        <h3>Integration risk</h3>
        <p>CMS proxy failures logged; graceful degradation when CMS or DMS endpoints are unavailable.</p>
        <h3>Data integrity risk</h3>
        <p>Session document ordering synchronized between member documents and session agenda records in CMS.</p>
    </section>

    <section id="section-10">
        <h2>10. Operational resilience</h2>
        <p class="section-lead">Continuity during disruptions</p>
        <p>
            Service continuity depends on CMS availability for council content and sessions, and DMS availability for
            legislative report pages. LIS supports operational recovery through application logs, manual content
            updates in CMS when integrations fail, and cached public pages where applicable.
        </p>
        <p>
            Incident response should follow: detect (logs/alerts), classify severity, contain (disable affected module
            or proxy), restore CMS/DMS connectivity, verify public report accuracy, and document root cause for governance review.
        </p>
    </section>

    <section id="section-11">
        <h2>11. Platform role summary</h2>
        <p class="section-lead">Legislative portal positioning in one view</p>
        <h3>LIS, in summary</h3>
        <ul>
            <li>Unifies public access to Sangguniang Bayan information and legislative documents for each deploying LGU.</li>
            <li>Provides SB members a secure channel to submit and forward documents to the secretary.</li>
            <li>Integrates CMS-managed content and DMS-stored records without replacing LGU approval authority.</li>
            <li>Supports live session visibility and comprehensive legislative report categories.</li>
            <li>Designed for white-label deployment across municipalities and cities without code changes per client.</li>
        </ul>
    </section>
@endsection

@section('cta')
    <h2>Ready to evaluate LIS for your LGU?</h2>
    <p>Prepare council structure, document types, CMS/DMS integration, and member onboarding for a rollout design workshop.</p>
    <div class="wp-cta-buttons">
        <a href="{{ $loginRoute }}" class="btn-primary-wp">{{ $loginLabel }}</a>
        <a href="{{ route('home.index') }}" class="btn-outline-wp">Back to home</a>
    </div>
@endsection
