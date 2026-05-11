import { useState } from "react";

export default function Sidebar() {
    const [isCollapsed, setIsCollapsed] = useState(false);

    return (
        <div className={`sidebar py-4 px-3 d-flex flex-column justify-content-between flex-shrink-0 ${isCollapsed ? 'collapsed' : ''}`}>
            <button
                className="btn btn-sm btn-link align-self-end mb-3 p-0"
                onClick={() => setIsCollapsed(!isCollapsed)}
                title={isCollapsed ? "Expand" : "Collapse"}
                style={{ color: '#1a1a1a' }}
            >
                <i className={`fa-solid fa-chevron-${isCollapsed ? 'right' : 'left'}`}></i>
            </button>
            <div>
                <div className="d-flex align-items-center mb-5 px-2">
                    <div className="logo-icon me-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor" />
                            <path d="M2 17L12 22L22 17M2 12L12 17L22 12" stroke="currentColor" strokeWidth="2"
                                strokeLinecap="round" strokeLinejoin="round" />
                        </svg>
                    </div>
                    {!isCollapsed && (
                        <span className="fs-6 fw-bold lh-1" style={{ letterSpacing: '-0.5px' }}>CAR<br />RENTAIL</span>
                    )}
                </div>
                <nav className="nav flex-column gap-1">
                    <a href="#" className="nav-link-custom" title="Home">
                        <i className="fa-solid fa-house fa-fw"></i>
                        {!isCollapsed && <span>Home</span>}
                    </a>
                    <a href="#" className="nav-link-custom active" title="Vehicles">
                        <i className="fa-solid fa-car fa-fw"></i>
                        {!isCollapsed && <span>Vehicles</span>}
                    </a>
                    <a href="#" className="nav-link-custom" title="Notes">
                        <i className="fa-regular fa-note-sticky fa-fw"></i>
                        {!isCollapsed && <span>Notes</span>}
                    </a>
                    <a href="#" className="nav-link-custom" title="Favourites">
                        <i className="fa-regular fa-heart fa-fw"></i>
                        {!isCollapsed && <span>Favourites</span>}
                    </a>
                    <a href="#" className="nav-link-custom" title="Recents">
                        <i className="fa-solid fa-clock-rotate-left fa-fw"></i>
                        {!isCollapsed && <span>Recents</span>}
                    </a>
                    {!isCollapsed && <div className="my-2"></div>}
                    <a href="#" className="nav-link-custom" title="Notifications">
                        <i className="fa-regular fa-bell fa-fw"></i>
                        {!isCollapsed && <span>Notifications</span>}
                    </a>
                    <a href="#" className="nav-link-custom" title="Chat">
                        <i className="fa-regular fa-comment fa-fw"></i>
                        {!isCollapsed && <span>Chat</span>}
                    </a>
                </nav>
            </div>
            <nav className="nav flex-column gap-1">
                <a href="#" className="nav-link-custom" title="License">
                    <i className="fa-regular fa-id-card fa-fw"></i>
                    {!isCollapsed && <span>License</span>}
                </a>
                <a href="#" className="nav-link-custom" title="Support">
                    <i className="fa-regular fa-circle-question fa-fw"></i>
                    {!isCollapsed && <span>Support</span>}
                </a>
                <a href="#" className="nav-link-custom" title="Logout">
                    <i className="fa-solid fa-arrow-right-from-bracket fa-fw"></i>
                    {!isCollapsed && <span>Logout</span>}
                </a>
            </nav>
        </div>
    );
}