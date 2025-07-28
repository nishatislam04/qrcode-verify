import { Link } from '@inertiajs/react';

export function Pagination({ links }: { links: any }) {
  return (
    <div className="flex flex-wrap justify-center items-center mt-6 space-x-1">
      {links.map((link: any, index: any) => {
        const isActive = link.active;
        const isDisabled = link.url === null;

        return (
          <Link
            key={index}
            href={link.url || ''}
            className={`px-3 py-1 border text-sm rounded ${isActive
              ? 'bg-blue-600 text-white'
              : isDisabled
                ? 'text-gray-400 border-gray-200'
                : 'hover:bg-blue-50 border-gray-300'
              }`}
            dangerouslySetInnerHTML={{ __html: link.label }}
            preserveScroll
            preserveState
            disabled={isDisabled}
          />
        );
      })}
    </div>
  );
}
